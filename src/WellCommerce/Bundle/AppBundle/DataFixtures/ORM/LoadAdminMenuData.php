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
use WellCommerce\Bundle\CoreBundle\Doctrine\Fixtures\AbstractDataFixture;

/**
 * Class LoadAdminMenuData
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class LoadAdminMenuData extends AbstractDataFixture
{
    public function load(ObjectManager $manager)
    {
        if (!$this->isEnabled()) {
            return;
        }

        $this->importAdminMenuConfiguration('catalog.xml');
        $this->importAdminMenuConfiguration('cms.xml');
        $this->importAdminMenuConfiguration('configuration.xml');
        $this->importAdminMenuConfiguration('crm.xml');
        $this->importAdminMenuConfiguration('dashboard.xml');
        $this->importAdminMenuConfiguration('integration.xml');
        $this->importAdminMenuConfiguration('layout.xml');
        $this->importAdminMenuConfiguration('promotions.xml');
        $this->importAdminMenuConfiguration('reports.xml');
        $this->importAdminMenuConfiguration('sales.xml');
    }
}
