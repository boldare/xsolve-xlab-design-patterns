<?php
require_once __DIR__.'/../vendor/autoload.php';

use XSolve\Workshop\Kata\Service\Provider\ControllerProvider;
use XSolve\Workshop\Kata\Service\Provider\ExampleServiceProvider;
use Symfony\Component\Yaml\Yaml;

$app = new Silex\Application();

$app['config'] = Yaml::parse(file_get_contents(__DIR__ . '/../app/config/parameters.yml'));

$config = $app['config']['app.workshop.kata'];

$app['debug'] = $config['debug'];

$app->register(new ExampleServiceProvider());

$app->mount('/', new ControllerProvider());

return $app;
