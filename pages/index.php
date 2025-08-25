<?php
// O seu arquivo navbar.php já é incluído aqui
include_once("navbar.php");
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
    <?php include_once("navbar.php"); ?>

    <div class="container text-center my-5">
        <div class="p-5 mb-4 bg-light rounded-3 shadow">
            <h1 class="display-4 fw-bold">Seja bem-vindo, fofinho! 👋</h1>
            <p class="fs-4">
                Este é o seu painel de controle. Use a barra de navegação acima para acessar as funcionalidades do
                sistema.
            </p>
        </div>

        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Gerenciar Alunos</h5>
                        <p class="card-text ">
                            Visualize os dados dos alunos cadastrados.
                        </p>
                        <a href="alunosList.php " class="btn btn-primary">Ir para a lista</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Cadastrar Novo</h5>
                        <p class="card-text">
                            Adicione um novo aluno ao sistema com facilidade.
                        </p>
                        <a href="formRegister.php" class="btn btn-success">Cadastrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>