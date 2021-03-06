<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 *
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace WellCommerce\Bundle\AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use WellCommerce\Bundle\AppBundle\Entity\Tax;
use WellCommerce\Bundle\CoreBundle\Doctrine\Fixtures\AbstractDataFixture;

/**
 * Class LoadTaxData
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class LoadTaxData extends AbstractDataFixture
{
    public static $samples = [0, 3, 5, 7, 23];
    
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        if (!$this->isEnabled()) {
            return;
        }
        
        foreach (self::$samples as $val) {
            $name = sprintf('%s%s', $val, '%');
            $tax  = new Tax();
            $tax->setValue($val);
            foreach ($this->getLocales() as $locale) {
                $tax->translate($locale->getCode())->setName($name . ' VAT');
            }
            
            $tax->mergeNewTranslations();
            $manager->persist($tax);
            $this->setReference('tax_' . $val, $tax);
        }
        
        $manager->flush();
    }
}
