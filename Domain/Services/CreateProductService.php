<?php

declare(strict_types=1);

namespace WideMorph\Ims\Bundle\ImsProductBundle\Domain\Services;

use WideMorph\Morph\Bundle\MorphCoreBundle\Domain\Services\Input\InputDataCollectionInterface;

class CreateProductService implements CreateProductServiceInterface
{
    /**
     * {@inheritDoc}
     */
    public function create(InputDataCollectionInterface $inputDataCollection): mixed
    {
        return null;
    }
}
