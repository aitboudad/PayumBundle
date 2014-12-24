<?php

namespace Payum\Bundle\PayumBundle\Factory;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

class PaypalRestPaymentFactory
{
    private $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * @paran array $config
     */
    public function create()
    {
        if (!defined('PP_CONFIG_PATH')) {
            define('PP_CONFIG_PATH', $this->config['config_path']);
        }

        return new ApiContext(new OAuthTokenCredential($this->config['client_id'], $this->config['client_secret']));
    }
}
