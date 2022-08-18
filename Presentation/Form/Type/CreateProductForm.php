<?php

declare(strict_types=1);

namespace WideMorph\Ims\Bundle\ImsProductBundle\Presentation\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use WideMorph\Ims\Bundle\ImsProductBundle\Interaction\MorphCoreInteractionInterface;

class CreateProductForm extends AbstractType
{
    /**
     * @param MorphCoreInteractionInterface $morphCoreInteraction
     */
    public function __construct(protected MorphCoreInteractionInterface $morphCoreInteraction)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $formBuilder = $this->morphCoreInteraction->getDomainInteraction()->getFormBuilderService();

        $formBuilder
            ->resetFields()
            ->add('name', TextType::class)
            ->add('description', TextType::class, 2)
            ->add('save', SubmitType::class, 3)
            ->build($builder, 'imsCreateProductForm');
    }

    /**
     * {@inheritDoc}
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => $this->morphCoreInteraction->getEntityResolver()->getEntityName('Product'),
        ]);
    }
}
