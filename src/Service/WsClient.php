<?php


namespace App\Service;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class WsClient implements WsClientInterface
{
    private $client;
    private $wsApiUrl;
    private $wsseHeader;

    public function __construct(
        string $wsApiUrl,
        string $wsApiUseName,
        string $WsApiPass,
        HttpClientInterface $client
    )
    {
        $this->client = $client;
        $this->wsApiUrl = $wsApiUrl;
        $this->wsseHeader = WsseGenerator::prepareWsseHeader($wsApiUseName, $WsApiPass);
    }

    public function wallets() : array
    {
        $response = $this->client->request(
            self::HTTP_GET_METHOD,
            $this->wsApiUrl . self::HTTP_ENDPOINT_WALLET,
            $this->wsseHeader
        );

        /*
         * @add return exception on error response
         */

        return $response->toArray();
    }

    public function financialMovements() : array
    {
        $response = $this->client->request(
            'GET',
            $this->wsApiUrl . self::HTTP_ENDPOINT_FINANCIAL_MOVEMENTS,
            $this->wsseHeader
        );

        /*
         * @add return exception on error response
         */

        return $response->toArray();
    }





}