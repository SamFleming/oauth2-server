<?php

namespace League\OAuth2\Server;

use Symfony\Bridge\PsrHttpMessage\Factory\DiactorosFactory;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Bridge\PsrHttpMessage\Factory\HttpFoundationFactory;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class HttpMessageConverter
{
    /**
     * Convert a Symfony HTTP Request to a Psr7 Response
     *
     * @param SymfonyRequest $request
     *
     * @return \Psr\Http\Message\ServerRequestInterface
     */
    static public function convertSymfonyRequestToPsr7(SymfonyRequest $request)
    {
        $psr7Factory = new DiactorosFactory();

        return $psr7Factory->createRequest($request);
    }

    /**
     * Convert a Symfony HTTP Response to a Psr7 Response
     *
     * @param SymfonyResponse $response
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    static public function convertSymfonyResponseToPsr7(SymfonyResponse $response)
    {
        $psr7Factory = new DiactorosFactory();

        return $psr7Factory->createResponse($response);
    }

    /**
     * Convert a Symfony HTTP Request to a Psr7 Response
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request
     *
     * @return \Symfony\Component\HttpFoundation\Request
     */
    static public function convertPsr7RequestToSymfony(ServerRequestInterface $request)
    {
        $httpFoundationFactory = new HttpFoundationFactory();

        return $httpFoundationFactory->createRequest($request);
    }

    /**
     * Convert a Symfony HTTP Response to a Psr7 Response
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    static public function convertPsr7ResponseToSymfony(ResponseInterface $response)
    {
        $httpFoundationFactory = new HttpFoundationFactory();

        return $httpFoundationFactory->createResponse($response);
    }
}
