<?php
namespace App\Controller;

use App\Service\WsClientInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

Class WalletController extends AbstractController
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
     * @Route("/wallet", name="app_wallet_list")
     */
    public function list()
    {
        $wallets = $this->wsClient->wallets();
        return $this->render('wallet/index.html.twig',
            array("wallets" => $wallets['wallets']
            ));
    }
}