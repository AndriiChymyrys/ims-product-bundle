<?php

declare(strict_types=1);

namespace WideMorph\Ims\Bundle\ImsProductBundle\Infrastructure\Repository;

use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use WideMorph\Ims\Bundle\ImsProductBundle\Infrastructure\Entity\Product;
use WideMorph\Ims\Bundle\ImsProductBundle\Interaction\MorphCoreInteractionInterface;
use WideMorph\Morph\Bundle\MorphCoreBundle\Domain\Services\Input\InputDataCollectionInterface;
use WideMorph\Ims\Bundle\ImsProductBundle\Interaction\Bridge\MorphCore\SelectDataSourceInterfaceBridge;

/**
 * Class ProductRepository
 *
 * @package WideMorph\Ims\Bundle\ImsProductBundle\Infrastructure\Repository
 */
class ProductRepository extends ServiceEntityRepository implements SelectDataSourceInterfaceBridge
{
    /** @var string */
    public const CONTEXT_NAME_SELECT_PRODUCT = 'select.product.list';

    public function __construct(
        ManagerRegistry $registry,
        protected MorphCoreInteractionInterface $morphCoreInteraction,
        string $entityClass = Product::class
    ) {
        parent::__construct($registry, $entityClass);
    }

    public function select(InputDataCollectionInterface $inputDataCollection, ?array $pagination = null): mixed
    {
        $queryContext = $this->morphCoreInteraction
            ->getDomainInteraction()
            ->getDoctrineDataFilterContextFactory()
            ->forQueryBuilder(
                $this->createQueryBuilder('p'),
                static::CONTEXT_NAME_SELECT_PRODUCT,
                true
            );

        [$page, $repPage] = $pagination;

        return $queryContext->execute()->setPagination($page, $repPage)->getResult();
    }
}
