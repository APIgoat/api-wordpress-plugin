<?php

use BernardoSilva\JWTAPIClient\APIClient;
use BernardoSilva\JWTAPIClient\AccessTokenCredentials;
use \Firebase\JWT\JWT;

include_once plugin_dir_path(dirname(__FILE__)) . 'includes/html_helper.php';

class APIgoatFetchAPI
{

    private $username = 'wp-behavior@apigoat.com';
    private $password = '0sKtegdSSk';
    private $baseURI = 'https://goat.local/p/goatcheese/api/v1/';
    private $jwt_pubkey = '9sKjdjuue8sSjwh6';
    private $jwt_alg = ['HS256'];
    private $client;
    private $credentials;

    public function __construct()
    {
        $this->client = new APIClient($this->baseURI);
        $this->clientOptions = [
            'verify' => false,
            'content-Type' => 'application/json',
            'accept' => 'application/json'
        ];

        if (!$this->authenticationValid()) {
            $this->authenticate();
            $this->saveCredentials();
            $this->client = new APIClient($this->baseURI, $this->credentials);
        } else {
            $this->credentials = new AccessTokenCredentials($_SESSION['APIgoat']['API_jwt_token']);
            $this->client->setCredentials($this->credentials);
        }
    }

    public function fetchBehaviors()
    {
        $clientOptions = $this->clientOptions;
        $clientOptions['query'] = [
            "Query" => [
                "select" => [
                    ["behavior.name", "name"], ["code", "title"], ["description", "text"], "value", "example", "type", ["behavior_category.name", "category_name"]
                ],
                "filter" => [
                    "behavior" => [
                        0 => ["group", "Free"],
                        1 => ["status", "Active"]
                    ]
                ],
                "join" => ["behavior_category"],
                "limit" => 20
            ],
            "debug" => true
        ];


        $response = $this->client->get('Behavior', $clientOptions);

        $body = json_decode($response->getBody()->getContents(), true);
        if ($response->getStatusCode() == 200) {
            return $body;
        } else {
            $body = json_decode($response->getBody(), true);
            return $body;
        }
    }

    private function saveCredentials()
    {
        if (!empty($this->jwt_pubkey)) {
            $decoded = JWT::decode($this->credentials->getAccessToken(), $this->jwt_pubkey, $this->jwt_alg);
            $_SESSION['APIgoat']['API_jwt_expire'] = $decoded->exp;
            $_SESSION['APIgoat']['API_jwt_token'] = $this->credentials->getAccessToken();
        }
    }

    private function authenticate()
    {
        $options = [
            'verify' => false, // might need this if API uses self signed certificate
            'form_params' => [
                'u' => $this->username,
                'pw' => md5($this->password)
            ],
            'debug' => false
        ];
        // authenticate on API to get token
        $response = $this->client->post('Authy/auth', $options);
        $loginResponseDecoded = json_decode($response->getBody()->getContents(), true);

        $this->credentials = new AccessTokenCredentials($loginResponseDecoded['token']);
    }

    private function authenticationValid()
    {
        if (isset($_SESSION['APIgoat']) && !empty($_SESSION['APIgoat']['API_jwt_token']) && $_SESSION['APIgoat']['API_jwt_expire'] > time()) {
            return true;
        }
        return false;
    }
}
