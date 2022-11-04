<?php

declare(strict_types=1);

namespace WideMorph\Ims\Bundle\ImsProductBundle\Domain\DataSource;

use Doctrine\ORM\EntityManagerInterface;
use WideMorph\Ims\Bundle\ImsProductBundle\Presentation\Form\Type\CreateProductForm;
use WideMorph\Ims\Bundle\ImsProductBundle\Interaction\MorphCoreInteractionInterface;
use WideMorph\Ims\Bundle\ImsProductBundle\Domain\Services\UpdateProductServiceInterface;
use WideMorph\Morph\Bundle\MorphCoreBundle\Interaction\Contract\DataSource\UpdateDataSourceInterface;
use WideMorph\Ims\Bundle\ImsProductBundle\Interaction\Bridge\MorphCore\FormDataSourceDefinitionInterfaceBridge;
use WideMorph\Ims\Bundle\ImsProductBundle\Interaction\Bridge\MorphCore\UpdateDataSourceDefinitionInterfaceBridge;

class UpdateProductDataSource implements UpdateDataSourceDefinitionInterfaceBridge,
                                         FormDataSourceDefinitionInterfaceBridge
{
    /**
     * @param UpdateProductServiceInterface $updateProductService
     * @param EntityManagerInterface $entityManager
     * @param MorphCoreInteractionInterface $morphCoreInteraction
     */
    public function __construct(
        protected UpdateProductServiceInterface $updateProductService,
        protected EntityManagerInterface $entityManager,
        protected MorphCoreInteractionInterface $morphCoreInteraction
    ) {
    }

    /**
     * {@inheritDoc}
     */
    public function getSource(): UpdateDataSourceInterface
    {
        return $this->updateProductService;
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdateItem(array $data): mixed
    {
        return $this->entityManager->getRepository(
            $this->morphCoreInteraction->getEntityResolver()->getEntityName('Product')
        )->find($data['productId']);
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
