<?php

namespace App\Util;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class OAuthRequest
{
    public function request(HttpClientInterface $httpClient, string $method, string $requestUri, array $queryParams = [])
    {
        return $httpClient->request($method, $requestUri, $this->options($method, $requestUri, $queryParams));
    }

    private function options(string $method, string $requestUri, array $queryParams = [])
    {
        // its only proof of concept, so lets begin hard coding!
        $consumerKey = 'ck_327110a012b6deaef384c12e93f9e37604a0d9db'; // we put this into query params
        $consumerSecret = 'cs_6d2006958a04093b052ac8851967ad73a976197d'; // we use this in signature generator

        $queryParams = array_merge($queryParams, [
            'oauth_consumer_key' => $consumerKey,
            'oauth_signature_method' => 'HMAC-SHA1',
            'oauth_timestamp' => date('U'),
            'oauth_nonce' => $this->noonce(),
            'oauth_version' => '1.0',
        ]);

        ksort($queryParams);
        $baseString = $this->baseString($method, $requestUri, $queryParams);

        $queryParams['oauth_signature'] = $this->sign($baseString, $consumerSecret . '&');

        return [
            'query' => $queryParams,
        ];
    }

    private function baseString(string $method, string $requestUri, array $queryParams)
    {
        $params = http_build_query($queryParams, null, '&', PHP_QUERY_RFC3986);
        return sprintf('%s&%s&%s', $method, rawurlencode($requestUri), rawurlencode($params));
    }

    private function sign(string $baseString, string $key)
    {
        return base64_encode(hash_hmac('sha1', $baseString, $key, true));
    }

    private function noonce()
    {
        $data = openssl_random_pseudo_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
}