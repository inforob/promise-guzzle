<?php

namespace App\Request;


use GuzzleHttp\Promise\PromiseInterface;

class Request
{
    /**
     * @param string $url
     * @param bool $redirect
     * @return PromiseInterface
     */
    public function doAsyncRequest(string $url, bool $redirect) : PromiseInterface
    {
        $client = new \GuzzleHttp\Client();
        $cookieJar = new \GuzzleHttp\Cookie\CookieJar();


        return $client->getAsync($url);

    }
}