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
namespace WellCommerce\Bundle\ShippingBundle\Repository;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\Criteria;
use WellCommerce\Bundle\CoreBundle\Repository\EntityRepository;
use WellCommerce\Bundle\ShippingBundle\Entity\ShippingMethodInterface;

/**
 * Class ShippingMethodRepository
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ShippingMethodRepository extends EntityRepository implements ShippingMethodRepositoryInterface
{
    public function getShippingMethods(): Collection
    {
        $criteria = new Criteria();
        $criteria->where($criteria->expr()->eq('enabled', true));
        $criteria->orderBy(['hierarchy' => 'asc']);
        
        $methods = $this->matching($criteria)->filter(function (ShippingMethodInterface $shippingMethod) {
            $paymentMethodsCount     = $shippingMethod->getPaymentMethods()->count();
            $shippingMethodCostCount = $shippingMethod->getCosts()->count();
            
            return $paymentMethodsCount > 0 && $shippingMethodCostCount > 0;
        });
        
        return $methods;
    }
    
    public function getDataGridFilterOptions(): array
    {
        $options = [];
        $methods = $this->matching(new Criteria());
        $methods->map(function (ShippingMethodInterface $method) use (&$options) {
            $options[] = [
                'id'          => $method->getId(),
                'name'        => $method->translate()->getName(),
                'hasChildren' => false,
                'parent'      => null,
                'weight'      => $method->getId(),
            ];
        });
        
        return $options;
    }
}
