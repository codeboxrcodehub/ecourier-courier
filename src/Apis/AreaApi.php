<?php

namespace Codeboxr\EcourierCourier\Apis;

use GuzzleHttp\Exception\GuzzleException;
use Codeboxr\EcourierCourier\Exceptions\EcourierException;

class AreaApi extends BaseApi
{
    /**
     * get city List
     *
     * @return mixed
     * @throws GuzzleException
     * @throws EcourierException
     */
    public function city()
    {
        $response = $this->authorization()->send("POST", "/api/city-list");
        return $response;
    }

    /**
     * get thana List
     *
     * @param string $cityName
     *
     * @return mixed
     * @throws EcourierException
     * @throws GuzzleException
     */
    public function thana($cityName)
    {
        $response = $this->authorization()->send("POST", "/api/thana-list", ["city" => $cityName]);
        return $response->message;
    }

    /**
     * Postcode list
     *
     * @param string $cityName
     * @param string $thanaName
     *
     * @return mixed
     * @throws EcourierException
     * @throws GuzzleException
     */
    public function postcode($cityName, $thanaName)
    {
        $response = $this->authorization()->send("POST", "/api/postcode-list", ["city" => $cityName, "thana" => $thanaName]);
        return $response->message;
    }


    /**
     * Area list
     *
     * @param int $postcode
     *
     * @return mixed
     * @throws EcourierException
     * @throws GuzzleException
     */
    public function areaList($postcode)
    {
        $response = $this->authorization()->send("POST", "/api/area-list", ["postcode" => $postcode]);
        return $response->message;
    }

    /**
     * Branch list
     *
     * @return mixed
     * @throws EcourierException
     * @throws GuzzleException
     */
    public function branch()
    {
        $response = $this->authorization()->send("POST", "api/branch-list");
        return $response;
    }


}
