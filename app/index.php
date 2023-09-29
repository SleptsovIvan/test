<?php
require './libs/Macaw.php';
require './services/cache/index.php';

use \NoahBuscher\Macaw\Macaw as Router;

Router::get('/home', function() {
    $key= md5($_SERVER['REQUEST_URI']);
    $cache = Cache::get($key);
    var_dump($cache);
    if ($cache) {
        echo $cache;
    } else {
        $time = time();
        echo $time;
        Cache::set($key, $time, 3600);
    }
});

Router::get('/hello', function() {
    echo 'Hello';
});

Router::error(function() {
    http_response_code(404);
    echo '404 NOT FOUND :(';
});

Router::dispatch();