<?php

namespace src\Routes;

class Routes
{
    private $routes = [];

    public function add($method, $path, $action)
    {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'action' => $action
        ];
    }

    public function handleRequest()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $fullpath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        $basePath = "/public";
        // Garante que $basePath só é removido se estiver no início da string
        if (strpos($fullpath, $basePath) === 0) {
            $path = substr($fullpath, strlen($basePath));
        } else {
            $path = $fullpath;
        }

        if ($path === false || $path === '') {
            $path = '/';
        }

        foreach ($this->routes as $r) {
            // Garante que o path começa com /
            $routePath = $r['path'];
            if ($routePath[0] !== '/') {
                $routePath = '/' . $routePath;
            }
            // Regex para parâmetros dinâmicos
            $pattern = preg_replace('/\{[^\}]+\}/', '([^/]+)', $routePath);
            $pattern = str_replace('/', '\/', $pattern);
            if ($r['method'] == $method && preg_match('/^' . $pattern . '$/', $path, $matches)) {
                array_shift($matches);
                call_user_func_array($r['action'], $matches);
                return;
            }
        }
        // Opcional: resposta para rota não encontrada
        http_response_code(404);
        echo "404 Not Found";
    }
}
