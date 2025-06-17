<?php

require_once __DIR__ . '/vendor/autoload.php';

use Fatec\Mvc\Routes\Routes;
use Fatec\Mvc\Controllers\AlunoController;
use Fatec\Mvc\Services\AlunoService;
use Fatec\Mvc\Models\Repository\AlunoRepository;

// Instancie o repositório e o serviço
$alunoRepository = new AlunoRepository();
$alunoService = new AlunoService($alunoRepository);
$alunoController = new AlunoController($alunoService);

$route = new Routes();

// ADICIONE AS ROTAS ANTES DO DISPATCH!
$route->add('POST', '/api/aluno', [$alunoController, 'criar']);
$route->add('GET', '/aluno/cadastro', [$alunoController, 'mostrarFormulario']);
?>