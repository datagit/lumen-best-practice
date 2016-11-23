<?php

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->get('/middleware', [ 'uses' => 'MiddlewaredController@index', 'middleware' => 'fullname' ]);

$app->get('/valid_response', [ 'uses' => 'ConsistencyController@validResponse' ]);
$app->get('/invalid_response', [ 'uses' => 'ConsistencyController@invalidResponse' ]);
$app->get('/error_response', [ 'uses' => 'ConsistencyController@errorResponse' ]);
$app->get('/unauthorized_response', [ 'uses' => 'ConsistencyController@unauthorizedResponse' ]);