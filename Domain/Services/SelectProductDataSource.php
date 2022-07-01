<?php

declare(strict_types=1);

namespace WideMorph\Ims\Bundle\ImsProductBundle\Domain\Services;

use WideMorph\Ims\Bundle\ImsProductBundle\Domain\Constraint\OrderProductFilterConstraint;
use WideMorph\Morph\Bundle\MorphCoreBundle\Domain\Services\Contracts\SelectDataSourceInterface;
use WideMorph\Morph\Bundle\MorphCoreBundle\Domain\Services\Contracts\ConstraintValidationRulesInterface;
use WideMorph\Ims\Bundle\ImsProductBundle\Interaction\Bridge\MorphCore\SelectDataSourceDefinitionInterfaceBridge;

class SelectProductDataSource implements SelectDataSourceDefinitionInterfaceBridge
{
    public function __construct(protected OrderProductFilterConstraint $orderProductFilterConstraint)
    {
    }

    public function getConstraint(): null|ConstraintValidationRulesInterface
    {
        return $this->orderProductFilterConstraint;
    }

    public function getSource(): SelectDataSourceInterface
    {
        // TODO: Implement getSource() method.
    }
}
