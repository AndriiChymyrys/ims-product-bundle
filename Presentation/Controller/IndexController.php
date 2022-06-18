<?php

declare(strict_types=1);

namespace WideMorph\Ims\Bundle\ImsProductBundle\Presentation\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use WideMorph\Ims\Bundle\ImsProductBundle\Interaction\MorphCoreInteractionInterface;

class IndexController extends AbstractController
{
    /**
     * @return Response
     */
    public function index(MorphCoreInteractionInterface $morphCoreInteraction): Response
    {
        $morphCoreInteraction->getEntityResolver();

        return $this->render('@ImsProduct/index/index.html.twig');
    }
}
