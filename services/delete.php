<?php
include_once "connection.php";

try {
    $id = $_GET["id"];
    $delete = $connection->prepare("DELETE FROM aluno WHERE id = :id");
    $delete->bindParam(':id', $id);
    $delete->execute();
    header("Location: ..\pages\alunosList.php?msg=Aluno excluído com sucesso!");
} catch (PDOException $e) {
    echo "" . $e->getMessage();
}
?>