<?php

declare(strict_types=1);

namespace WideMorph\Ims\Bundle\ImsProductBundle\Domain\Services;

use Doctrine\ORM\EntityManagerInterface;
use WideMorph\Morph\Bundle\MorphCoreBundle\Domain\Services\Input\InputDataCollectionInterface;

/**
 * Class DeleteProductService
 *
 * @package WideMorph\Ims\Bundle\ImsProductBundle\Domain\Services
 */
class DeleteProductService implements DeleteProductServiceInterface
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
    public function delete(InputDataCollectionInterface $inputDataCollection, mixed $target): mixed
    {
        $this->entityManager->remove($target);
        $this->entityManager->flush();

        return true;
    }
}
