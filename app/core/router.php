<?php

namespace App\Core;

class Router
{
    protected $routes;
    protected $basePath;

    public function __construct($basePath = '')
    {
        $this->basePath = $basePath;
        $this->routes = require __DIR__ . '/../../routes/web.php';
    }

    public function dispatch()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $path = parse_url($uri, PHP_URL_PATH);

        if (strpos($path, $this->basePath) === 0) {
            $path = substr($path, strlen($this->basePath));
        }

        $path = trim($path, '/');

        if (isset($this->routes[$path])) {
            $this->routes[$path](); // ✅ call matched route
        } else {
            http_response_code(404);
            echo '❌ 404 Not Found';
        }
    }
}
