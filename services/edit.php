<?php
include_once "connection.php";

$id = $_POST['id'];
$nome = trim($_POST['nome']);
$idade = trim($_POST['idade']);
$cpf = trim($_POST['cpf']);
$data_nascimento = trim($_POST['data_nascimento']);
$email = trim($_POST['email']);
$telefone = trim($_POST['telefone']);
$endereco = trim($_POST['endereco']);
$curso = trim($_POST['curso']);
$periodo = trim($_POST['periodo']);
$situacao = trim($_POST['situacao']);
$data_atualizacao = date('Y-m-d H:i:s');

try {
    $update = $connection->prepare("UPDATE aluno SET nome = :nome, idade = :idade, cpf = :cpf, curso = :curso, periodo = :periodo, email = :email, telefone = :telefone, data_nascimento = :data_nascimento, endereco = :endereco, situacao = :situacao, data_atualizacao = :data_atualizacao WHERE id = :id");
    $update->bindParam(':id', $id);
    $update->bindParam(':nome', $nome);
    $update->bindParam(':idade', $idade);
    $update->bindParam(':cpf', $cpf);
    $update->bindParam(':curso', $curso);
    $update->bindParam(':periodo', $periodo);
    $update->bindParam(':email', $email);
    $update->bindParam(':telefone', $telefone);
    $update->bindParam(':data_nascimento', $data_nascimento);
    $update->bindParam(':endereco', $endereco);
    $update->bindParam(':situacao', $situacao);
    $update->bindParam(':data_atualizacao', $data_atualizacao);

    $update->execute();
    header("Location: ../pages/alunosList.php?msg=Aluno atualizado com sucesso!");
} catch (PDOException $e) {
    echo "" . $e->getMessage();
}
?>