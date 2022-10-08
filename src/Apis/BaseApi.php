<?php

namespace Codeboxr\EcourierCourier\Apis;

use  GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\ClientException;
use Codeboxr\EcourierCourier\Exceptions\EcourierException;

class BaseApi
{
    /**
     * @var string
     */
    private $baseUrl;

    /**
     * @var Client
     */
    private $request;

    /**
     * @var array
     */
    private $headers;

    public function __construct()
    {
        $this->setBaseUrl();
        $this->setHeaders();
        $this->request = new Client([
            'base_uri' => $this->baseUrl,
            'headers'  => $this->headers
        ]);
    }

    /**
     * Set Base Url on sandbox mode
     */
    private function setBaseUrl()
    {
        if (config("ecourier.sandbox") == true) {
            $this->baseUrl = "https://staging.ecourier.com.bd";
        } else {
            $this->baseUrl = "https://backoffice.ecourier.com.bd";
        }
    }

    /**
     * Set Default Headers
     */
    private function setHeaders()
    {
        $this->headers = [
            "Accept"       => "application/json",
            "Content-Type" => "application/json",
        ];
    }


    /**
     * Authorization set to header
     *
     * @return $this
     */
    public function authorization()
    {
        $this->headers = [
            "Accept"       => "application/json",
            "Content-Type" => "application/json",
            'API-KEY'      => config("ecourier.app_key"),
            'API-SECRET'   => config("ecourier.app_secret"),
            'USER-ID'      => config("ecourier.user_id")
        ];

        return $this;
    }

    /**
     * Sending Request
     *
     * @param string $method
     * @param string $uri
     * @param array $body
     *
     * @return mixed
     * @throws EcourierException
     * @throws GuzzleException
     */
    public function send($method, $uri, $body = [])
    {
        try {
            $response = $this->request->request($method, $uri, [
                "headers" => $this->headers,
                "body"    => json_encode($body)
            ]);
            return json_decode($response->getBody());
        } catch (ClientException $e) {
            $response = json_decode($e->getResponse()->getBody()->getContents());
            $message  = implode(",", $response->errors);
            throw new EcourierException($message, $e->getCode(), $response->errors);
        }
    }

}
