<?php

declare(strict_types=1);

namespace WideMorph\Ims\Bundle\ImsProductBundle\Interaction;

use WideMorph\Ims\Bundle\ImsProductBundle\ImsProductBundle;
use WideMorph\Morph\Bundle\MorphCoreBundle\Interaction\DomainInteractionInterface;
use WideMorph\Morph\Bundle\MorphCoreBundle\Domain\Services\Entity\EntityResolverInterface;

/**
 * Class MorphCoreInteraction
 *
 * @package WideMorph\Ims\Bundle\ImsProductBundle\Interaction
 */
class MorphCoreInteraction implements MorphCoreInteractionInterface
{
    /**
     * @param DomainInteractionInterface $domainInteraction
     */
    public function __construct(protected DomainInteractionInterface $domainInteraction)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function getDomainInteraction(): DomainInteractionInterface
    {
        return $this->domainInteraction;
    }

    /**
     * {@inheritDoc}
     */
    public function getEntityResolver(): EntityResolverInterface
    {
        return $this->domainInteraction
            ->getEntityResolverFactory()
            ->forBundle(ImsProductBundle::class)
            ->attachEntity('Product')
            ->get();
    }
}
