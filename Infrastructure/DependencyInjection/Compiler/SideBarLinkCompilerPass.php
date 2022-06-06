<?php

declare(strict_types=1);

namespace WideMorph\Ims\Bundle\ImsProductBundle\Infrastructure\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use WideMorph\Ims\Bundle\ImsProductBundle\Interaction\MorphViewInteractionInterface;

/**
 * Class SideBarLinkCompilerPass
 *
 * @package WideMorph\Ims\Bundle\ImsProductBundle\Infrastructure\DependencyInjection\Compiler
 */
class SideBarLinkCompilerPass implements CompilerPassInterface
{
    /**
     * {@inheritDoc}
     */
    public function process(ContainerBuilder $container)
    {
        if ($container->hasDefinition(MorphViewInteractionInterface::SIDE_BAR_LINK_SERVICE_NAME)) {
            $sideBarLink = $container->getDefinition(MorphViewInteractionInterface::SIDE_BAR_LINK_SERVICE_NAME);
            $sideBarLink->addMethodCall('addLink', ['product_ims_product_list', 'Product', 1]);
        }
    }
}
