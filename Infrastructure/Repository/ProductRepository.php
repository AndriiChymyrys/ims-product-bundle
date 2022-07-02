<?php

declare(strict_types=1);

namespace WideMorph\Ims\Bundle\ImsProductBundle\Infrastructure\Repository;

use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use WideMorph\Ims\Bundle\ImsProductBundle\Infrastructure\Entity\Product;
use WideMorph\Morph\Bundle\MorphCoreBundle\Domain\Services\Contracts\InputDataCollectionInterface;
use WideMorph\Ims\Bundle\ImsProductBundle\Interaction\Bridge\MorphCore\SelectDataSourceInterfaceBridge;

/**
 * Class ProductRepository
 *
 * @package WideMorph\Ims\Bundle\ImsProductBundle\Infrastructure\Repository
 */
class ProductRepository extends ServiceEntityRepository implements SelectDataSourceInterfaceBridge
{
    public function __construct(ManagerRegistry $registry, string $entityClass = Product::class)
    {
        parent::__construct($registry, $entityClass);
    }

    public function select(InputDataCollectionInterface $inputDataCollection): mixed
    {
        return [];
    }
}
