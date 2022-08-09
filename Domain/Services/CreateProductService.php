<?php

declare(strict_types=1);

namespace WideMorph\Ims\Bundle\ImsProductBundle\Domain\Services;

use Doctrine\ORM\EntityManagerInterface;
use WideMorph\Ims\Bundle\ImsProductBundle\Infrastructure\Entity\Product;
use WideMorph\Morph\Bundle\MorphCoreBundle\Domain\Services\Input\InputDataCollectionInterface;

/**
 * Class CreateProductService
 *
 * @package WideMorph\Ims\Bundle\ImsProductBundle\Domain\Services
 */
class CreateProductService implements CreateProductServiceInterface
{
    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(protected EntityManagerInterface $entityManager)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function create(InputDataCollectionInterface $inputDataCollection): mixed
    {
        if ($inputDataCollection->hasForm()) {
            /** @var Product $product */
            $product = $inputDataCollection->getForm()->getData();

            $this->entityManager->persist($product);
            $this->entityManager->flush();

            return $product;
        }

        return [];
    }
}
