<?php

declare(strict_types=1);

namespace WideMorph\Ims\Bundle\ImsProductBundle\Domain\Services;

use Doctrine\ORM\EntityManagerInterface;
use WideMorph\Morph\Bundle\MorphCoreBundle\Domain\Services\Input\InputDataCollectionInterface;

class UpdateProductService implements UpdateProductServiceInterface
{
    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(protected EntityManagerInterface $entityManager)
    {
    }

    public function update(InputDataCollectionInterface $inputDataCollection, mixed $updateData): mixed
    {
        return [];
    }
}
