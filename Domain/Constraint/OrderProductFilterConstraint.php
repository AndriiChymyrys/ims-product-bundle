<?php

declare(strict_types=1);

namespace WideMorph\Ims\Bundle\ImsProductBundle\Domain\Constraint;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Collection;
use WideMorph\Ims\Bundle\ImsProductBundle\Interaction\Bridge\MorphCore\ConstraintValidationRule;

/**
 * Class OrderProductFilterConstraint
 *
 * @package WideMorph\Ims\Bundle\ImsProductBundle\Domain\Constraint
 */
class OrderProductFilterConstraint extends ConstraintValidationRule
{
    public function getConstraints(): Collection
    {
        return new Assert\Collection([
            'name' => new Assert\Collection([
                'firstName' => new Assert\Type('string'),
                'secondName' => new Assert\Type('string')
            ]),
            'email' => new Assert\Email()
        ]);
    }
}
