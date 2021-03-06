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

namespace WellCommerce\Bundle\CoreBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use WellCommerce\Bundle\CoreBundle\DependencyInjection\Compiler;
use WellCommerce\Bundle\CoreBundle\HttpKernel\AbstractWellCommerceBundle;

/**
 * Class WellCommerceCoreBundle
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
final class WellCommerceCoreBundle extends AbstractWellCommerceBundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new Compiler\FormDataTransformerPass());
        $container->addCompilerPass(new Compiler\FormResolverPass());
        $container->addCompilerPass(new Compiler\DataSetContextPass());
        $container->addCompilerPass(new Compiler\DataSetTransformerPass());
        $container->addCompilerPass(new Compiler\RegisterTraitGeneratorEnhancerPass());
        $container->addCompilerPass(new Compiler\RegisterClassMetadataEnhancerPass());
    }
}
