<?php
class Cache 
{    
    private static $instance;

    private static function connect() {
        if (!self::$instance) {
            self::$instance = new Redis();
            self::$instance->connect('redis', 6379);
            self::$instance->auth($_ENV['REDIS_PASSWORD']);
        }
    }

    public static function set($key, $value, $ex = 20) {
        self::connect();
        self::$instance->set($key, $value, $ex);
    }

    public static function get($key) {
        self::connect();
        return self::$instance->get($key);
    }
}
?>