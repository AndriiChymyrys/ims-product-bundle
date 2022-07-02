<?php

declare(strict_types=1);

namespace WideMorph\Ims\Bundle\ImsProductBundle\Domain\Services;

use Doctrine\ORM\EntityManagerInterface;
use WideMorph\Ims\Bundle\ImsProductBundle\Interaction\MorphCoreInteractionInterface;
use WideMorph\Ims\Bundle\ImsProductBundle\Domain\Constraint\OrderProductFilterConstraint;
use WideMorph\Morph\Bundle\MorphCoreBundle\Domain\Services\Contracts\SelectDataSourceInterface;
use WideMorph\Morph\Bundle\MorphCoreBundle\Domain\Services\Contracts\ConstraintValidationRulesInterface;
use WideMorph\Ims\Bundle\ImsProductBundle\Interaction\Bridge\MorphCore\SelectDataSourceDefinitionInterfaceBridge;

/**
 * Class SelectProductDataSource
 *
 * @package WideMorph\Ims\Bundle\ImsProductBundle\Domain\Services
 */
class SelectProductDataSource implements SelectDataSourceDefinitionInterfaceBridge
{
    /**
     * @param OrderProductFilterConstraint $orderProductFilterConstraint
     * @param EntityManagerInterface $entityManager
     * @param MorphCoreInteractionInterface $morphCoreInteraction
     */
    public function __construct(
        protected OrderProductFilterConstraint $orderProductFilterConstraint,
        protected EntityManagerInterface $entityManager,
        protected MorphCoreInteractionInterface $morphCoreInteraction
    ) {
    }

    /**
     * {@inheritDoc}
     */
    public function getConstraint(): null|ConstraintValidationRulesInterface
    {
        return $this->orderProductFilterConstraint;
    }

    /**
     * {@inheritDoc}
     */
    public function getSource(): SelectDataSourceInterface
    {
        return $this->entityManager->getRepository(
            $this->morphCoreInteraction->getEntityResolver()->getEntityName('Product')
        );
    }
}
