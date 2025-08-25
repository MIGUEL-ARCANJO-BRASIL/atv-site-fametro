<?php
include_once "../services/connection.php";

try {
    $id = $_GET["id"];
    $query = $connection->query("SELECT * FROM aluno WHERE id = '$id' ");
    $aluno = $query->fetch(PDO::FETCH_ASSOC);

    if (!$aluno) {
        throw new Exception("Aluno não encontrado.");
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
    <?php include_once("../pages/navbar.php") ?>

    <div class="container mt-5">
        <div class="card shadow">
            <div class=" card-header  text-white" style="background-color: #1b5cb5">
                <h4 class="mb-0">Dados do Aluno</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-2"><strong>Nome:</strong> <?= htmlspecialchars($aluno['nome']) ?></p>
                        <p class="mb-2"><strong>Idade:</strong> <?= htmlspecialchars($aluno['idade']) ?></p>
                        <p class="mb-2"><strong>CPF:</strong> <?= htmlspecialchars($aluno['cpf']) ?></p>
                        <p class="mb-2"><strong>E-mail:</strong> <?= htmlspecialchars($aluno['email']) ?></p>
                        <p class="mb-2"><strong>Telefone:</strong> <?= htmlspecialchars($aluno['telefone']) ?></p>
                    </div>

                    <div class="col-md-6">
                        <p class="mb-2"><strong>Endereço:</strong> <?= htmlspecialchars($aluno['endereco']) ?></p>
                        <p class="mb-2"><strong>Curso:</strong> <?= htmlspecialchars($aluno['curso']) ?></p>
                        <p class="mb-2"><strong>Período:</strong> <?= htmlspecialchars($aluno['periodo']) ?></p>
                        <p class="mb-2"><strong>Situação:</strong> <?= htmlspecialchars($aluno['situacao']) ?></p>
                        <p class="mb-2"><strong>Data de Nascimento:</strong>
                            <?= htmlspecialchars(date('d/m/Y', strtotime($aluno['data_nascimento']))) ?></p>
                        <p class="mb-2"><strong>Última Atualização:</strong>
                            <?= ($aluno['data_atualizacao'] == null)
                                ? "Não atualizado"
                                : htmlspecialchars(date('d/m/Y H:i', strtotime($aluno['data_atualizacao'])))
                                ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <a href="editForm.php?id=<?= $aluno['id'] ?>" class="btn btn-primary me-2">Editar</a>
                <button type="button" onclick="history.back()" class="btn btn-secondary">Voltar</button>
            </div>
        </div>
    </div>
</body>

</html>