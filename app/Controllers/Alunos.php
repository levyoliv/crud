<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlunoModel;
use CodeIgniter\HTTP\ResponseInterface;

class Alunos extends BaseController
{
    public function listar()
    {
        $aluno_model = new AlunoModel();

        $alunos = $aluno_model->findAll();

        $data['alunos'] = $alunos;

        echo View('templates/header');
        echo View('alunos/listar', $data);
        echo View('templates/footer');
    }

    public function cadastrar()
    {
        $dados = $this->request->getVar();

        $aluno_model = new AlunoModel();

        $aluno_model->insert($dados);

        return redirect()->to('/alunos/listar?alert=successCreate');
    }

    public function excluir($AlunoId)
    {
        $aluno_model = new AlunoModel();
        
        $aluno_model
        ->where('AlunoId', $AlunoId)
        ->delete();
        return redirect()->to('/alunos/listar?alert=successDelete');
    }

    public function editar()
    {
        $dados = $this->request->getVar();

        $aluno_model = new AlunoModel();

        $aluno_model
        ->where('AlunoId',  $dados['AlunoId'])
        ->set($dados)
        ->update();

        return redirect()->to('/alunos/listar?alert=successEdit');
    }
}