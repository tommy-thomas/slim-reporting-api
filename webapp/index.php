<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require __DIR__ . "/../vendor/autoload.php";

/**
 * @SWG\Info(title="SSD API", version="1.0")
 */


$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
	 'addContentLengthHeader' => false
    ],
];

$c = new \Slim\Container($configuration);

//Override the default Not Found Handler
$c['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
        return $c['response']
            ->withStatus(404)
            ->withHeader('Content-Type', 'text/html')
            ->write('Not a valid route.');
    };
};
$app = new \Slim\App($c);

require __DIR__ . "/bootstrap.php";

$app->add( new \MyNameSpace\AnnualReport\Middleware\Auth() );

$app->add(new RKA\Middleware\IpAddress());

$app->run();