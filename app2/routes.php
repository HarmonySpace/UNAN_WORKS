<?php

$routes = function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', 'Records::index');
    $r->addRoute('POST', '/records', 'Records::records');
    $r->addRoute('GET', '/result', 'Records::result');
    $r->addRoute('GET', '/faculties', 'Faculties::index');
    $r->addRoute('GET', '/faculties/{id}/careers', 'Faculties::careers');
};

$dispatcher = FastRoute\simpleDispatcher($routes);
