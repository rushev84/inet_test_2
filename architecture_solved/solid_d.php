<?php

interface XMLHTTPRequestService
{
}

class XMLHttpService implements XMLHTTPRequestService
{
}

class Http
{
    private $service;

    public function __construct(XMLHTTPRequestService $xmlHttpService)
    {
    }

    public function get(string $url, array $options)
    {
        $this->service->request($url, 'GET', $options);
    }

    public function post(string $url)
    {
        $this->service->request($url, 'GET');
    }
}
