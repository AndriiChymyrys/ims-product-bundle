<?php

declare(strict_types=1);

namespace WideMorph\Ims\Bundle\ImsProductBundle\Domain\Services;

use Doctrine\ORM\EntityManagerInterface;
use WideMorph\Morph\Bundle\MorphCoreBundle\Domain\Services\Input\InputDataCollectionInterface;

/**
 * Class UpdateProductService
 *
 * @package WideMorph\Ims\Bundle\ImsProductBundle\Domain\Services
 */
class UpdateProductService implements UpdateProductServiceInterface
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
    public function update(InputDataCollectionInterface $inputDataCollection, mixed $target): mixed
    {
        $this->entityManager->flush();

        return $target;
    }
}
