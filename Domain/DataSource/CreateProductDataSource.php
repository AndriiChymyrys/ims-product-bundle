<?php

declare(strict_types=1);

namespace WideMorph\Ims\Bundle\ImsProductBundle\Domain\DataSource;

use WideMorph\Ims\Bundle\ImsProductBundle\Domain\Services\CreateProductServiceInterface;
use WideMorph\Ims\Bundle\ImsProductBundle\Presentation\Controller\Form\Type\CreateProductForm;
use WideMorph\Morph\Bundle\MorphCoreBundle\Domain\Services\Contracts\CreateDataSourceInterface;
use WideMorph\Ims\Bundle\ImsProductBundle\Interaction\Bridge\MorphCore\FormDataSourceDefinitionInterfaceBridge;
use WideMorph\Ims\Bundle\ImsProductBundle\Interaction\Bridge\MorphCore\CreateDataSourceDefinitionInterfaceBridge;

/**
 * Class CreateProductDataSource
 *
 * @package WideMorph\Ims\Bundle\ImsProductBundle\Domain\DataSource
 */
class CreateProductDataSource implements CreateDataSourceDefinitionInterfaceBridge, FormDataSourceDefinitionInterfaceBridge
{
    /**
     * @param CreateProductServiceInterface $createProductService
     */
    public function __construct(protected CreateProductServiceInterface $createProductService)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function getSource(): CreateDataSourceInterface
    {
        return $this->createProductService;
    }

    /**
     * {@inheritDoc}
     */
    public function getForm(): string
    {
        return CreateProductForm::class;
    }

    /**
     * {@inheritDoc}
     */
    public function getFormOptions(): array
    {
        return [];
    }
}
