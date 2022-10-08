<?php

namespace Codeboxr\EcourierCourier\Apis;

use Illuminate\Http\JsonResponse;
use GuzzleHttp\Exception\GuzzleException;
use Codeboxr\EcourierCourier\Exceptions\EcourierException;

class OrderApi extends BaseApi
{
    /**
     * Package list
     *
     * @return mixed
     * @throws EcourierException
     * @throws GuzzleException
     */
    public function packageList()
    {
        $response = $this->authorization()->send("POST", "api/packages");
        return $response;
    }

    /**
     * Create Order
     *
     * @param array $array
     *
     * @return JsonResponse
     * @throws EcourierException
     * @throws GuzzleException
     */
    public function create($array)
    {
        $response = $this->authorization()->send("POST", "api/order-place-reseller", $array);
        return response()->json([
            "success"       => $response->success,
            "response_code" => $response->response_code,
            "message"       => $response->message,
            "ID"            => $response->ID,
        ]);
    }


    public function tracking($trackingId)
    {
        $response = $this->authorization()->send("POST", "api/track", ["ecr" => $trackingId]);
        return $response;
    }
}
