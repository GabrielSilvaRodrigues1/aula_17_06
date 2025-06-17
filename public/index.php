<?php

require_once __DIR__ . '/../vendor/autoload.php';

use src\Routes\Routes;
use src\Controllers\AlunoController;

$route = new Routes();

// Rota apenas para API (Back-End)
$route->add('POST', 'api/aluno', [new AlunoController(), 'criar']);

// Rota para Front-End e Back-End em PHP
$route->add('GET', 'aluno/cadastro', [new AlunoController(), 'mostrarFormulario']);

$route->handleRequest();
