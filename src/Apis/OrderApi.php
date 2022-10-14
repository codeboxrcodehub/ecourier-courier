<?php

namespace Codeboxr\EcourierCourier\Apis;

use Illuminate\Http\JsonResponse;
use GuzzleHttp\Exception\GuzzleException;
use Codeboxr\EcourierCourier\Exceptions\EcourierException;
use Codeboxr\EcourierCourier\Exceptions\EcourierValidationException;

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
     * @throws GuzzleException|EcourierValidationException
     */
    public function create($array)
    {
        $this->validation($array, [
            "pick_district",
            "pick_thana",
            "pick_union",
            "pick_address",
            "pick_mobile",
            "recipient_name",
            "recipient_mobile",
            "recipient_city",
            "recipient_area",
            "recipient_thana",
            "recipient_union",
            "recipient_address",
            "package_code",
            "product_price",
            "payment_method",
            "ep_id",
            "pick_hub"
        ]);

        $response = $this->authorization()->send("POST", "api/order-place-reseller", $array);
        return response()->json([
            "success"       => $response->success,
            "response_code" => $response->response_code,
            "message"       => $response->message,
            "ID"            => $response->ID,
        ]);
    }

    /**
     * @param $trackingId
     *
     * @return mixed
     * @throws EcourierException
     * @throws GuzzleException
     */
    public function tracking($trackingId)
    {
        $response = $this->authorization()->send("POST", "api/track", ["ecr" => $trackingId]);
        return $response;
    }


    /**
     * Cancel Order
     *
     * @param array $array
     *
     * @return mixed
     * @throws EcourierException
     * @throws EcourierValidationException
     * @throws GuzzleException
     */
    public function cancelOrder($array)
    {
        $this->validation($array, ["tracking", "comment"]);
        $response = $this->authorization()->send("POST", "api/cancel-order", $array);
        return $response;
    }
}
