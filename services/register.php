<?php
include_once 'connection.php';

$nome = ucwords(trim($_POST['nome']));
$cpf = trim($_POST['cpf']);
$data_nascimento = trim($_POST['data_nascimento']);
$email = trim($_POST['email']);
$telefone = trim($_POST['telefone']);
$endereco = trim($_POST['endereco']);
$curso = trim($_POST['curso']);
$periodo = trim($_POST['periodo']);
$situacao = trim($_POST['situacao']);

$data_nascimento_obj = new DateTime($data_nascimento);
$data_hoje_obj = new DateTime(date('Y-m-d'));

$diferenca = $data_hoje_obj->diff($data_nascimento_obj);
$idade = $diferenca->y;

$insert = $connection->prepare('INSERT INTO aluno (nome, idade,cpf,
data_nascimento,email,telefone,endereco,curso,periodo,situacao) VALUES (:nome, :idade, :cpf,:data_nascimento, :email, :telefone, :endereco, :curso, :periodo, :situacao)');

$insert->bindParam(':nome', $nome);
$insert->bindParam(':idade', $idade);
$insert->bindParam(':cpf', $cpf);
$insert->bindParam(':data_nascimento', $data_nascimento);
$insert->bindParam(':email', $email);
$insert->bindParam(':telefone', $telefone);
$insert->bindParam(':endereco', $endereco);
$insert->bindParam(':curso', $curso);
$insert->bindParam(':periodo', $periodo);
$insert->bindParam(':situacao', $situacao);


$insert->execute();
header('Location: ../pages/alunosList.php');
exit;
?>