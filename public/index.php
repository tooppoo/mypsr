<?php
require __DIR__ . '/../vendor/autoload.php';

error_reporting(E_ALL);

$whoops = new \Whoops\Run();
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$psr17Factory = new \Nyholm\Psr7\Factory\Psr17Factory();

$creator = new \Nyholm\Psr7Server\ServerRequestCreator(
  $psr17Factory,
  $psr17Factory,
  $psr17Factory,
  $psr17Factory
);

$serverRequest = $creator->fromGlobals();
$path = $serverRequest->getUri()->getPath();

if ($path === '/') {
  echo date('Y年m月d日 H時i分s秒');
}
