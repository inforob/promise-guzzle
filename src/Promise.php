<?php

namespace App;

use App\Request\Request;
use GuzzleHttp\Psr7\Response;

class Promise
{
    public function print_json()
    {
        $request = new Request();

        $promise = $request->doAsyncRequest('https://jsonplaceholder.typicode.com/todos/', false);

        $promise->then(function ($response) {
            /** @var Response $response */
            echo 'Got a response! ' . $response->getStatusCode();
            $json = $response->getBody()->getContents();

            print_r(json_decode($json));
        });

        $promise->wait();

        if ($promise->getState() === 'fulfilled') {
            print_r('this ok');
        }



    }
}