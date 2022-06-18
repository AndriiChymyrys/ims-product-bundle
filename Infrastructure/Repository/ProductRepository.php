<?php

declare(strict_types=1);

namespace WideMorph\Ims\Bundle\ImsProductBundle\Infrastructure\Repository;

use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use WideMorph\Ims\Bundle\ImsProductBundle\Infrastructure\Entity\Product;

/**
 * Class ProductRepository
 *
 * @package WideMorph\Ims\Bundle\ImsProductBundle\Infrastructure\Repository
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, string $entityClass = Product::class)
    {
        parent::__construct($registry, $entityClass);
    }

    public function getList()
    {

    }
}
