<?php

namespace Nekkoy\GatewayWhatsapp\Services;

use Nekkoy\GatewayWhatsapp\DTO\ConfigDTO;

/**
 * Load and make gateway config
 */
class GatewayService
{
    protected $config;

    public function __construct()
    {
        $this->config = config('gateway-whatsapp', []);
    }

    /**
     * @return ConfigDTO
     */
    public function getConfig()
    {
        return new ConfigDTO($this->config);
    }
}
