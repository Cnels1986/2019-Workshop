<?php
  use \Psr\Http\Message\ServerRequestInterface as Request;
  use \Psr\Http\Message\ResponseInterface as Response;

  $config['displayErrorDetails'] = true;
  $config['addContentLengthHeader'] = false;

  $config['db']['host']   = 'localhost';
  $config['db']['user']   = 'root';
  $config['db']['pass']   = 'Eagles111';
  $config['db']['dbname'] = 'exampleapp';

  require '../vendor/autoload.php';

  $app = new \Slim\App(['settings' => $config]);
  $app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
  });
  $app->run();
 ?>
