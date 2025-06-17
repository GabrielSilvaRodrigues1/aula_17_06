<?php
namespace Fatec\Mvc\Controllers;

use Fatec\Mvc\Services\AlunoService;

class AlunoController{
    private $service;

    public function __construct(AlunoService $service)
    {
        $this->service = $service;
    }

    public function criar(){
        $data =  json_decode(file_get_contents("php://input"));
        echo json_encode(
            $this->service->criar($data->nome, $data->genero)
        );
    }
    public function mostrarFormulario(){
        include_once $_SERVER['DOCUMENT_ROOT'] . '/view/aluno/form.php';
    }

}
?>