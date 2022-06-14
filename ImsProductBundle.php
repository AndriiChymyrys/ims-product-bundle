<?php

declare(strict_types=1);

namespace WideMorph\Ims\Bundle\ImsProductBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use WideMorph\Ims\Bundle\ImsProductBundle\Infrastructure\DependencyInjection\ImsProductExtension;
use WideMorph\Ims\Bundle\ImsProductBundle\Infrastructure\DependencyInjection\Compiler\MorphExternalConfigPass;
use WideMorph\Ims\Bundle\ImsProductBundle\Infrastructure\DependencyInjection\Compiler\SideBarLinkCompilerPass;

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
        $container->addCompilerPass(new MorphExternalConfigPass());
    }

    /**
     * {@inheritDoc}
     */
    public function getContainerExtension(): ?ExtensionInterface
    {
        return new ImsProductExtension();
    }
}
