<?php

namespace Fatec\Mvc\Routes;

class Routes {
    private $routes = [];

    // Adiciona uma rota ao array de rotas
    public function add(string $method, string $path, callable $handler) {
        $this->routes[] = [
            'method' => strtoupper($method),
            'path' => $path,
            'handler' => $handler
        ];
    }

    // Busca uma rota pelo método e caminho
    public function match(string $method, string $path) {
        foreach ($this->routes as $route) {
            if ($route['method'] === strtoupper($method) && $route['path'] === $path) {
                return $route['handler'];
            }
        }
        return null;
    }

    // Retorna todas as rotas registradas
    public function getRoutes(): array {
        return $this->routes;
    }
    public function dispatch($method, $path) {
        $handler = $this->match($method, $path);
        if ($handler) {
            call_user_func($handler);
        } else {
            http_response_code(404);
            echo "Rota não encontrada!";
        }
    }
}
// $method = $_SERVER['REQUEST_METHOD'];
// $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// $route->dispatch($method, $path);
?>