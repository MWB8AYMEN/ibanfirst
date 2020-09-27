<?php


namespace App\Service;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
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

    /**
     * @return iterable
     */
    public function wallets() : iterable
    {
        $response = $this->client->request(
            self::HTTP_GET_METHOD,
            $this->wsApiUrl . self::HTTP_ENDPOINT_WALLET,
            $this->wsseHeader
        );

        if($response->getStatusCode() !== Response::HTTP_OK){
            throw new HttpException(Response::HTTP_UNAUTHORIZED, 'Access Unauthorized');
        }

        return $response->toArray();
    }

    /**
     * @return iterable
     */
    public function financialMovements() : iterable
    {
        $response = $this->client->request(
            'GET',
            $this->wsApiUrl . self::HTTP_ENDPOINT_FINANCIAL_MOVEMENTS,
            $this->wsseHeader
        );

       if($response->getStatusCode() !== Response::HTTP_OK){
           throw new HttpException(Response::HTTP_UNAUTHORIZED, 'Access Unauthorized');
       }

        return $response->toArray();
    }





}