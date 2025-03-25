<?php

namespace Nekkoy\GatewayWhatsapp\DTO;

use Nekkoy\GatewayAbstract\DTO\AbstractConfigDTO;

/**
 *
 */
class ConfigDTO extends AbstractConfigDTO
{
    /**
     * API URL
     * @var string
     */
    public $api_url;

    /**
     * API KEY
     * @var string
     */
    public $api_key;

    /**
     * Phone ID
     * @var int
     */
    public $phone_id;

    /**
     * @var string
     */
    public $handler = \Nekkoy\GatewayWhatsapp\Services\SendMessageService::class;
}
