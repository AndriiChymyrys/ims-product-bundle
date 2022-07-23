<?php

declare(strict_types=1);

namespace WideMorph\Ims\Bundle\ImsProductBundle\Presentation\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use WideMorph\Ims\Bundle\ImsProductBundle\Domain\DataSource\SelectProductDataSource;
use WideMorph\Ims\Bundle\ImsProductBundle\Interaction\MorphCoreInteractionInterface;
use WideMorph\Ims\Bundle\ImsProductBundle\Domain\DataSource\CreateProductDataSource;

class IndexController extends AbstractController
{
    /**
     * @param MorphCoreInteractionInterface $morphCoreInteraction
     *
     * @return Response
     */
    public function index(
        MorphCoreInteractionInterface $morphCoreInteraction,
    ): Response {
        $outputData = $morphCoreInteraction
            ->getDomainInteraction()
            ->getSelectDataSourceService()
            ->execute(SelectProductDataSource::class);

        return $this->render('@ImsProduct/index/index.html.twig', ['output' => $outputData]);
    }

    /**
     * @param MorphCoreInteractionInterface $morphCoreInteraction
     *
     * @return Response
     */
    public function create(
        MorphCoreInteractionInterface $morphCoreInteraction,
    ): Response
    {
        $outputData = $morphCoreInteraction
            ->getDomainInteraction()
            ->getCreateDataSourceService()
            ->execute(CreateProductDataSource::class);

        return $this->render('@ImsProduct/index/create.html.twig');
    }
}
