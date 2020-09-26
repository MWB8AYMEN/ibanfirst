<?php
namespace App\Service;

interface WsClientInterface
{
    public const HTTP_GET_METHOD = 'GET';
    public const HTTP_ENDPOINT_WALLET = '/wallets/';
    public const HTTP_ENDPOINT_FINANCIAL_MOVEMENTS = '/financialMovements/';
}