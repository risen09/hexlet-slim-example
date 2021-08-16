<?php

// Подключение автозагрузки через composer
require __DIR__ . '/../vendor/autoload.php';

use Slim\Factory\AppFactory;

$app = AppFactory::create();
$app->addErrorMiddleware(true, true, true);

$app->get('/', function ($request, $response) {
    $response->getBody()->write('Welcome to Slim!');
    return $response;
    // Благодаря пакету slim/http этот же код можно записать короче
    // return $response->write('Welcome to Slim!');
});

$app->get('/users', function ($request, $response) {
    return $response->write('GET /users');
});

$app->get('/courses/{id}', function ($request, $response, array $args) {
    $id = $args['id'];
    return $response->write("Course id: {$id}");
});
// $app->post('/users', function ($request, $response) {
//     return $response->withStatus(302);
// });

$app->post('/users', function ($request, $response) {
    $page = $request->getQueryParam('page', 1);
    $per = $request->getQueryParam('per', 10);
    // Тут обработка
    return $response;
});

$app->run();