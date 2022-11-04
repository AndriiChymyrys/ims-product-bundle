<?php

declare(strict_types=1);

namespace WideMorph\Ims\Bundle\ImsProductBundle\Domain\DataSource;

use Doctrine\ORM\EntityManagerInterface;
use WideMorph\Ims\Bundle\ImsProductBundle\Interaction\MorphCoreInteractionInterface;
use WideMorph\Ims\Bundle\ImsProductBundle\Domain\Constraint\OrderProductFilterConstraint;
use WideMorph\Morph\Bundle\MorphCoreBundle\Domain\Services\Input\InputDataCollectionInterface;
use WideMorph\Morph\Bundle\MorphCoreBundle\Interaction\Contract\DataSource\SelectDataSourceInterface;
use WideMorph\Morph\Bundle\MorphCoreBundle\Interaction\Contract\ConstraintValidationRulesInterface;
use WideMorph\Ims\Bundle\ImsProductBundle\Interaction\Bridge\MorphCore\SelectDataSourceDefinitionInterfaceBridge;
use WideMorph\Ims\Bundle\ImsProductBundle\Interaction\Bridge\MorphCore\ConstraintDataSourceDefinitionInterfaceBridge;

/**
 * Class SelectProductDataSource
 *
 * @package WideMorph\Ims\Bundle\ImsProductBundle\Domain\DataSource
 */
class SelectProductDataSource implements SelectDataSourceDefinitionInterfaceBridge,
                                         ConstraintDataSourceDefinitionInterfaceBridge
{
    /** @var int */
    public const PER_PAGE = 20;

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
    public function getConstraint(): ConstraintValidationRulesInterface
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

    /**
     * {@inheritDoc}
     */
    public function getSourcePagination(InputDataCollectionInterface $inputDataCollection): ?array
    {
        $page = $inputDataCollection->containsKey('page') ? $inputDataCollection->get('page') : 1;

        return [$page, static::PER_PAGE];
    }
}
