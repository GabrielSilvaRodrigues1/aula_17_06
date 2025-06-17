<?php
    namespace Fatec\Mvc\Controllers;

    use Fatec\Mvc\Services\AlunoService;
    use Fatec\Mvc\Models\Entity\Aluno;

    class AlunoController {
        private $service;

        public function __construct(AlunoService $service)
        {
            $this->service = $service;
        }

        public function criar(){
            $data = json_decode(file_get_contents("php://input"));
            $aluno = new Aluno();
            $aluno->setNome($data->nome);
            $aluno->setGenero($data->genero);
            $this->service->criar($aluno);
            echo json_encode(['status' => 'success']);
        }

        public function mostrarFormulario(){
            try{
                // Incluir o arquivo de visualização do formulário
                require_once __DIR__ . '/../../view/aluno/form.php';
            } catch (Exception $e) {
                // Tratar exceção, se necessário
                echo "Erro ao carregar o formulário: " . $e->getMessage();
            }
        }
    }
?>