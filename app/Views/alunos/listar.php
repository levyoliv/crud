<div class="modal fade" id="modal-novo-aluno">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="/alunos/cadastrar" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Registrar Aluno</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Nome</label>
                                <input type="text" class="form-control" name="Nome">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Endereço</label>
                                <input type="text" class="form-control" name="Endereço">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="Email">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Editar Aluno -->
<div class="modal fade" id="modal-editar-alu">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="/alunos/editar" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Aluno</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Nome</label>
                                <input type="text" class="form-control" id="modal-editar-alu-Nome" name="Nome">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Endereço</label>
                                <input type="text" class="form-control" id="modal-editar-alu-Endereço" name="Endereço">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" id="modal-editar-alu-Email" name="Email">
                            </div>
                        </div>

                        <input type="hidden" id="modal-editar-alu-AlunoId" name="AlunoId">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Alunos</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Alunos</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-novo-aluno">
                                <i class="fas fa-plus-circle"></i> Registrar Aluno
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (isset($_GET['alert']) && $_GET['alert'] == "successCreate"): ?>
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> Sucesso!</h5>
                            Aluno registrado com sucesso!
                        </div>
                    </div>
                </div>

            <?php endif; ?>
            <?php if (isset($_GET['alert']) && $_GET['alert'] == "successDelete"): ?>
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> Sucesso!</h5>
                            Aluno excluido com sucesso!
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (isset($_GET['alert']) && $_GET['alert'] == "successEdit"): ?>
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> Sucesso!</h5>
                            Aluno editado com sucesso!
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>MATRÍCULA</th>
                                        <th>NOME</th>
                                        <th>ENDEREÇO</th>
                                        <th>EMAIL</th>
                                        <th>AÇÕES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($alunos as $alu): ?>
                                        <tr>
                                            <td><?= $alu['AlunoId'] ?></td>
                                            <td><?= $alu['Nome'] ?></td>
                                            <td><?= $alu['Endereço'] ?></td>
                                            <td><?= $alu['Email'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" onclick="prepararDados(<?= $alu['AlunoId'] ?>, '<?= $alu['Nome'] ?>', '<?= $alu['Endereço'] ?>', '<?= $alu['Email'] ?>')"><i class="fas fa-edit"></i></button>

                                                <a href="/alunos/excluir/<?= $alu['AlunoId'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    function prepararDados(AlunoId, Nome, Endereço, Email) {
        document.getElementById('modal-editar-alu-AlunoId').value = AlunoId;
        document.getElementById('modal-editar-alu-Nome').value = Nome;
        document.getElementById('modal-editar-alu-Endereço').value = Endereço;
        document.getElementById('modal-editar-alu-Email').value = Email;

        $('#modal-editar-alu').modal('show');
    }
</script>