<?php
namespace Fatec\Mvc\Services;

use Fatec\Mvc\Models\Repository\AlunoRepository;
use Fatec\Mvc\Models\Entity\Aluno;

class AlunoService
{
    private AlunoRepository $alunoRepository;

    public function __construct(AlunoRepository $alunoRepository)
    {
        $this->alunoRepository = $alunoRepository;
    }

    public function criar(Aluno $aluno): void
    {
        $this->alunoRepository->save($aluno);
    }
}
