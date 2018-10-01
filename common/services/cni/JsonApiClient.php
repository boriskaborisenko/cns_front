<?php
namespace common\services\cni;

use common\services\api\AbstractJsonApiClient;

class JsonApiClient extends AbstractJsonApiClient
{
    protected $user_agent = 'cni';

    public function createResponse($answer, $response_time)
    {
        $response = new \stdClass();
        $response->meta = new \stdClass();
        $response->data = new \stdClass();
        if (property_exists($answer, 'meta')) {
            $response->meta = $answer->meta;
        }
        if (property_exists($answer, 'data')) {
            $response->data = $answer->data;
        }
        $response->meta->time = $response_time;
        return $response;
    }
}
