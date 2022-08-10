<?php

declare(strict_types=1);

namespace WideMorph\Ims\Bundle\ImsProductBundle\Presentation\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use WideMorph\Ims\Bundle\ImsProductBundle\Domain\DataSource\SelectProductDataSource;
use WideMorph\Ims\Bundle\ImsProductBundle\Interaction\MorphCoreInteractionInterface;
use WideMorph\Ims\Bundle\ImsProductBundle\Domain\DataSource\CreateProductDataSource;
use WideMorph\Ims\Bundle\ImsProductBundle\Domain\DataSource\UpdateProductDataSource;

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
    ): Response {
        $outputData = $morphCoreInteraction
            ->getDomainInteraction()
            ->getCreateDataSourceService()
            ->execute(CreateProductDataSource::class);

        if ($outputData->isSubmitted() && $outputData->isSuccess()) {
            return $this->redirectToRoute('product_ims_product_list');
        }

        return $this->render('@ImsProduct/index/create.html.twig', ['output' => $outputData]);
    }

    /**
     * @param MorphCoreInteractionInterface $morphCoreInteraction
     * @param int $id
     *
     * @return Response
     */
    public function update(
        MorphCoreInteractionInterface $morphCoreInteraction,
        int $id
    ): Response {
        $outputData = $morphCoreInteraction
            ->getDomainInteraction()
            ->getUpdateDataSourceService()
            ->execute(sourceName: UpdateProductDataSource::class, options: ['productId' => $id]);

        if ($outputData->isSubmitted() && $outputData->isSuccess()) {
            return $this->redirectToRoute('product_ims_product_list');
        }

        return $this->render('@ImsProduct/index/update.html.twig', ['output' => $outputData]);
    }
}
