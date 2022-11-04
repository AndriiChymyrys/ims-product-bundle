<?php

declare(strict_types=1);

namespace WideMorph\Ims\Bundle\ImsProductBundle\Domain\DataSource;

use Doctrine\ORM\EntityManagerInterface;
use WideMorph\Ims\Bundle\ImsProductBundle\Interaction\MorphCoreInteractionInterface;
use WideMorph\Ims\Bundle\ImsProductBundle\Domain\Services\DeleteProductServiceInterface;
use WideMorph\Morph\Bundle\MorphCoreBundle\Interaction\Contract\DataSource\DeleteDataSourceInterface;
use WideMorph\Ims\Bundle\ImsProductBundle\Interaction\Bridge\MorphCore\DeleteDataSourceDefinitionInterfaceBridge;

/**
 * Class DeleteProductDataSource
 *
 * @package WideMorph\Ims\Bundle\ImsProductBundle\Domain\DataSource
 */
class DeleteProductDataSource implements DeleteDataSourceDefinitionInterfaceBridge
{
    /**
     * @param DeleteProductServiceInterface $deleteProductService
     * @param EntityManagerInterface $entityManager
     * @param MorphCoreInteractionInterface $morphCoreInteraction
     */
    public function __construct(
        protected DeleteProductServiceInterface $deleteProductService,
        protected EntityManagerInterface $entityManager,
        protected MorphCoreInteractionInterface $morphCoreInteraction
    ) {
    }

    /**
     * {@inheritDoc}
     */
    public function getSource(): DeleteDataSourceInterface
    {
        return $this->deleteProductService;
    }

    /**
     * {@inheritDoc}
     */
    public function getDeleteItem(array $data): mixed
    {
        return $this->entityManager->getRepository(
            $this->morphCoreInteraction->getEntityResolver()->getEntityName('Product')
        )->find($data['productId']);
    }
}
