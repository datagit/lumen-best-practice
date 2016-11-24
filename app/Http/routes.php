<?php

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->get('/validate/number', [ 'uses' => 'ValidationController@validateNumber' ]);
$app->get('/validate/oddnumber', [ 'uses' => 'ValidationController@validateOddNumber' ]);

$app->get('/valid_response', [ 'uses' => 'ConsistencyController@validResponse' ]);
$app->get('/invalid_response', [ 'uses' => 'ConsistencyController@invalidResponse' ]);
$app->get('/error_response', [ 'uses' => 'ConsistencyController@errorResponse' ]);
$app->get('/unauthorized_response', [ 'uses' => 'ConsistencyController@unauthorizedResponse' ]);