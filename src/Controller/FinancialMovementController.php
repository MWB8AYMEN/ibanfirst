<?php


namespace App\Controller;


use App\Service\WsClientInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FinancialMovementController extends AbstractController
{
    /**
     * @var WsClientInterface
     */
    protected $wsClient;

    public function __construct(WsClientInterface $wsClient)
    {
        $this->wsClient = $wsClient;
    }
    /**
     * @Route("/financialMovement", name="app_financial_movement_list")
     */
    public function list()
    {
        $financialMovements = $this->wsClient->financialMovements();
        return $this->render('financialMovement/index.html.twig',
            array("financialMovements" => $financialMovements['financialMovements']
            ));
    }

}