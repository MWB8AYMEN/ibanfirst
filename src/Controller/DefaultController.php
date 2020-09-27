<?php
namespace App\Controller;

use App\Service\WsClient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

Class DefaultController extends AbstractController
{
    /**
     * @Route("/}", name="app_wallet_list")
     */
    public function index()
    {
        return $this->render('base.html.twig'
            );
    }
}