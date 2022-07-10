<?php

declare(strict_types=1);

namespace WideMorph\Ims\Bundle\ImsProductBundle\Presentation\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use WideMorph\Ims\Bundle\ImsProductBundle\Domain\Services\SelectProductDataSource;
use WideMorph\Ims\Bundle\ImsProductBundle\Interaction\MorphCoreInteractionInterface;

class IndexController extends AbstractController
{
    /**
     * @return Response
     */
    public function index(
        MorphCoreInteractionInterface $morphCoreInteraction,
    ): Response {
        $outputData = $morphCoreInteraction
            ->getDomainInteraction()
            ->getSelectDataSourceService()
            ->execute(SelectProductDataSource::class);

        return $this->render('@ImsProduct/index/index.html.twig');
    }
}
