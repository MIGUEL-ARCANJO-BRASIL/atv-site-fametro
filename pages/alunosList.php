<?php

include_once '..\services\connection.php';
try {
    $query_list = $connection->query('SELECT * FROM aluno');
    $alunos_list = $query_list->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

</head>

<body>
    <?php include_once("navbar.php") ?>

    <div class="container mt-4">
        <div class="card" style="background-color: #1b5cb5">
            <div class="card-header">
                <h4 style="color: white">Lista de Alunos Cadastrados
                    <a class="btn btn-success float-end mb-2" href="formRegister.php" style="color:> white">Cadastrar
                        Novo
                        Aluno</a>
                </h4>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Curso</th>
                        <th scope="col">Período</th>
                        <th scope="col">Situação</th>
                        <th scope="col">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($alunos_list)): ?>
                        <tr>
                            <td colspan="12" class="text-center">Nenhum aluno cadastrado.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($alunos_list as $aluno): ?>
                            <tr>
                                <td><?= htmlspecialchars($aluno['nome']) ?></td>
                                <td><?= htmlspecialchars($aluno['cpf']) ?></td>
                                <td><?= htmlspecialchars($aluno['email']) ?></td>
                                <td><?= htmlspecialchars($aluno['telefone']) ?></td>
                                <td><?= htmlspecialchars($aluno['curso']) ?></td>
                                <td><?= htmlspecialchars($aluno['periodo']) ?></td>

                                </td>
                                <td><?= htmlspecialchars($aluno['situacao']) ?></td>
                                <td>
                                    <div class="d-flex align-items-center">

                                        <a href="viewAluno.php?id=<?= $aluno['id'] ?>" class="me-1">
                                            <img src="..\imgs\view.png" width="35" alt="Visualizar">
                                        </a>

                                        <a href="editForm.php?id=<?= $aluno['id'] ?>" class="me-2">
                                            <img src="..\imgs\pen.png" width="30" alt="Editar">
                                        </a>

                                        <a onClick="return confirm('Tem certeza que deseja remover este aluno?')"
                                            href="..\services\delete.php?id=<?= $aluno['id'] ?>">
                                            <img src="..\imgs\delete.png" width="30" alt="Excluir">
                                        </a>

                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php $num_registros = count($alunos_list); ?>
        <h4>Total de Alunos Cadastrados: <?= $num_registros ?></h4>
    </div>

</body>

</html>