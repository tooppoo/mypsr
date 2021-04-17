<?php
namespace philomagi\MyPsr\Http\Handler;

use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class DateAction implements RequestHandlerInterface
{
  /**
   * Handles a request and produces a response.
   *
   * May call other collaborating code to generate the response.
   */
  public function handle(ServerRequestInterface $request): ResponseInterface
  {
    $psr17Factory = new \Nyholm\Psr7\Factory\Psr17Factory();
    $response = $psr17Factory->createResponse(200)
      ->withHeader('Content-Type', 'text/plain;charset=UTF-8')
      ->withBody(
        $psr17Factory->createStream(date('Y年m月d日 H時i分s秒'))
      );

    return $response;
  }
}