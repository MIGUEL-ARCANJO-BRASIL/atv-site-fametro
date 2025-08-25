<?php
include_once "../services/connection.php";

try {
    $id = $_GET["id"];

    $query = $connection->query("SELECT * FROM aluno WHERE id = '$id' ");
    $row = $query->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
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
    <title>Formulário de Edição</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>

    <?php include_once("navbar.php") ?>

    <div class="container mt-5 mb-5">
        <div class="card" style="background-color: #1b5cb5">
            <div class="card-header">
                <h4 style="color: white">Editar Aluno</h4>
            </div>
        </div>
        <div class="card shadow p-4">
            <div class="card-body">
                <form action="../services/.php" method="POST">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>">

                    <div class="row mb-3">
                        <label for="nome" class="col-sm-4 col-form-label">Nome Completo:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="nome" id="nome"
                                value="<?= htmlspecialchars($row['nome']) ?>" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="idade" class="col-sm-4 col-form-label">Idade:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="number" name="idade" id="idade" min="0"
                                value="<?= htmlspecialchars($row['idade']) ?>" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="cpf" class="col-sm-4 col-form-label">CPF:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="number" name="cpf" id="cpf" min="0"
                                value="<?= htmlspecialchars($row['cpf']) ?>" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="    _nascimento" class="col-sm-4 col-form-label">Data de Nascimento:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="date" name="data_nascimento" id="data_nascimento"
                                value="<?= htmlspecialchars(substr($row['data_nascimento'], 0, 10)) ?>" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-sm-4 col-form-label">E-mail:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="email" name="email" id="email"
                                value="<?= htmlspecialchars($row['email']) ?>" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="telefone" class="col-sm-4 col-form-label">Telefone:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="tel" name="telefone" id="telefone"
                                placeholder="(DDD) 9XXXX-XXXX" pattern="[0-9]{2}9[0-9]{8}"
                                value="<?= htmlspecialchars($row['telefone']) ?>" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="endereco" class="col-sm-4 col-form-label">Endereço:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="endereco" id="endereco"
                                value="<?= htmlspecialchars($row['endereco']) ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="curso" class="col-sm-4 col-form-label">Curso:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="curso" id="curso"
                                value="<?= htmlspecialchars($row['curso']) ?>" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="periodo" class="col-sm-4 col-form-label">Período/Ano:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="number" name="periodo" id="periodo" min="1"
                                value="<?= htmlspecialchars($row['periodo']) ?>" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="situacao" class="col-sm-4 col-form-label">Situação:</label>
                        <div class="col-sm-8">
                            <select class="form-select" name="situacao" id="situacao" required>
                                <option value="ativo" <?= $row['situacao'] == 'ativo' ? 'selected' : '' ?>>Ativo</option>
                                <option value="inativo" <?= $row['situacao'] == 'inativo' ? 'selected' : '' ?>>Inativo
                                </option>
                                <option value="trancado" <?= $row['situacao'] == 'trancado' ? 'selected' : '' ?>>Trancado
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-sm-8 offset-sm-4">
                            <button class="btn btn-primary me-2" type="submit">Atualizar</button>
                            <a onClick="return confirm('Tem certeza que deseja remover este aluno?')"
                                class="btn btn-danger me-2"
                                href="../services/delete.php?id=<?= $row['id'] ?>">Excluir</a>
                            <button type="button" onclick="history.back()" class="btn btn-secondary">Voltar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>