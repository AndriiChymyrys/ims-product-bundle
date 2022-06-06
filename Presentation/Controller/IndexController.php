<?php

declare(strict_types=1);

namespace WideMorph\Ims\Bundle\ImsProductBundle\Presentation\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController
{
    /**
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('@ImsProduct/index/index.html.twig');
    }
}
