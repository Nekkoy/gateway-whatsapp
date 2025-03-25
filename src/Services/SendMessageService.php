<?php

namespace Nekkoy\GatewayWhatsapp\Services;

use Nekkoy\GatewayAbstract\Services\AbstractSendMessageService;
use Nekkoy\GatewayWhatsapp\DTO\ConfigDTO;

/**
 *
 */
class SendMessageService extends AbstractSendMessageService
{
    /** @var string */
    protected $api_url = 'https://graph.facebook.com/v21.0/%s/messages';

    /** @var ConfigDTO */
    protected $config;

    /**  */
    protected function init() {
        $this->api_url = $this->config->api_url;

        $this->header = [
            "Content-Type: application/json",
            sprintf("Authorization: Bearer %s", $this->config->api_key)
        ];
    }

    /** @return string */
    protected function url()
    {
        return sprintf($this->api_url, $this->config->phone_id);
    }

    /** @return mixed */
    protected function data()
    {
        return json_encode([
            "messaging_product" => "whatsapp",
            "recipient_type" => "individual",
            "to" => $this->message->destination,
            "type" => "text",
            "text" => [
                "body" => $this->message->text,
            ]
        ]);
    }

    /** @return mixed */
    protected function development()
    {
        return '{}';
    }

    /** @return array */
    protected function response()
    {
        $response = json_decode($this->response, true);
        if( isset($response["messages"]) ) {
            $info = reset($response["messages"]);

            if( isset($info["id"]) ) {
                $this->response_code = 0;
            }
        }

        return $response;
    }
}
