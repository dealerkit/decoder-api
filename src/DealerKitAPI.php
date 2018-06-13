<?php

namespace fiamma06\dealerkit\api;

use GuzzleHttp;

/**
 * Class DealerKitAPI
 * @package fiamma06\dealerkit\api
 */
class DealerKitAPI {

    /**
     * Api Token
     *
     * @var string
     */
    protected $token;

    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * Base api url
     *
     * @var
     */
    protected $api_url = 'http://dealerkit.co/api/';

    /**
     * Reponse format
     *
     * @var string
     */
    protected $response_format = 'json';

    /**
     * DealerKitAPI constructor.
     *
     * @param string $api_key - personal token
     * @url https://dealerkit.co/dashboard/index
     */
    public function __construct($api_key = 'XXXXXXXX')
    {
        $this->token = $api_key;
        $this->client = new GuzzleHttp\Client([
            'base_uri' => $this->api_url
        ]);
    }

    /**
     * Vin Decode method
     *
     * @param $vin
     * @return string
     */
    public function getVinLookup($vin) {
        return $this->request('get-vin', [
            'vin' => $vin,
        ]);
    }

    /**
     * Basic information about subscribed tariff plan
     *
     * @return string
     */
    public function getBillingInfo() {
        return $this->request('billing');
    }

    /**
     * Get basic usage statistics
     *
     * @return string
     */
    public function getUsageStatistics() {
        return $this->request('stat');
    }

    /**
     * Wrapper for http request method
     *
     * @param $method
     * @param $params
     * @return string
     */
    protected function request($method, $params = []) {
        $params = array_merge([
            'token' => $this->token,
            'format' => $this->response_format
        ], $params);

        $response = $this->client->get($method, [
            'query' => $params
        ])->getBody()->getContents();

        return $response;
    }
}
