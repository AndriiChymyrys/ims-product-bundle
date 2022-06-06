<?php

declare(strict_types=1);

namespace WideMorph\Ims\Bundle\ImsProductBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use WideMorph\Ims\Bundle\ImsProductBundle\Infrastructure\DependencyInjection\Compiler\SideBarLinkCompilerPass;
use WideMorph\Ims\Bundle\ImsProductBundle\Infrastructure\DependencyInjection\ImsProductExtension;

/**
 * Class ImsProductBundle
 *
 * @package WideMorph\Ims\Bundle\ImsProductBundle
 */
class ImsProductBundle extends Bundle
{
    /**
     * {@inheritDoc}
     */
    public function build(ContainerBuilder $container): void
    {
        $container->addCompilerPass(new SideBarLinkCompilerPass());
    }

    /**
     * {@inheritDoc}
     */
    public function getContainerExtension(): ?ExtensionInterface
    {
        return new ImsProductExtension();
    }
}
