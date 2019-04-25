<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    // $app->get('/[{name}]', function (Request $request, Response $response, array $args) use ($container) {
    //     // Sample log message
    //     $container->get('logger')->info("Slim-Skeleton '/' route");
    //
    //     // Render index view
    //     return $container->get('renderer')->render($response, 'index.phtml', $args);
    // });

    $app->get('/todos', function($request, $response, $args) {
      $res = $this->db->prepare("SELECT * FROM tasks ORDER BY task");
      $res->execute();
      $todos = $res->fetchAll();
      return $this->response->withJSON($todos);
    });

    $app->get('/todos/[{id}]', function ($request, $response, $args) {
      $res = $this->db->prepare("SELECT * FROM tasks WHERE id = :id");
      $res->bindParam('id', $arg['id']);
      $res->execute();
      $todos = $res->fetchObject();
      return $this->response->withJSON($todos);
    });

    $app->get('/todos/search/[{query}]', function ($request, $response, $args) {
      $res = $this->db->prepare("SELECT * FROM tasks WHERE UPPER(task) LIKE :query ORDER BY task");
      $query = "%".$args['query']."%";
      $res->bindParam("query", $query);
      $res->execute();
      $todos = $res->fetchAll();
      return $this->response->withJSON($todos);
    });

    $app->post('/todo', function($request, $response, $args) {
      $input = $request->getParsedBody();
      $sql = "INSERT INTO tasks (task) VALUES (:task)";
      $res = $this->db->prepare($sql);
      $res->bindParam("task", $input['task']);
      $res->execute();
      $input['id'] = $this->db->lastInsertId();
      return $this->response->withJSON($input);
    });

    $app->delete('/todo/[{id}]', function($request, $response, $args) {
      $res = $this->db->prepare("DELETE FROM tasks WHERE id=:id");
      $res -> bindParam("id", $args['id']);
      $res->execute();
      $todos = $res->fetchAll();
      return $this->response->withJSON($todos);
    });

    $app->put('/todo/[{id}]', function($request, $response, $args) {
      $input = $request->getParsedBody();
      $sql = "UPDATE tasks SET task=:task WHERE id=:id";
      $res -> $this->db->prepare($sql);
      $res -> bindParam('id', $args['id']);
      $res -> bindParam('task', $input['task']);
      $res -> execute();
      $input['id'] = $args['id'];
      return $this->response->withJSON($input);
    });
};
