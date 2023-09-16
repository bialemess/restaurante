<?php
include("conexaoBD.php");

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $nomePrato = isset($_POST["nomePrato"]) ? $_POST["nomePrato"] : "";
    $precoPrato = isset($_POST["precoPrato"]) ? $_POST["precoPrato"] : "";
    $ingredientesPrato = isset($_POST["ingredientesPrato"]) ? $_POST["ingredientesPrato"] : "";
    $pesoPrato = isset($_POST["pesoPrato"]) ? $_POST["pesoPrato"] : "";
    $fotoPrato = isset($_POST["imagemPrato"]) ? $_POST["imagemPrato"] : "";

    try {
        $stmt = $pdo->prepare("UPDATE pratosPHP SET nomePrato = :nomePrato, precoPrato = :precoPrato, ingredientesPrato = :ingredientesPrato, pesoPrato = :pesoPrato, imagemPrato = :imagemPrato  WHERE nomePrato = :nomePrato");
        $stmt->bindValue(':nomePrato', $nomePrato, PDO::PARAM_STR);
        $stmt->bindValue(':precoPrato', $precoPrato, PDO::PARAM_STR);
        $stmt->bindValue(':ingredientesPrato', $ingredientesPrato, PDO::PARAM_STR);
        $stmt->bindValue(':pesoPrato', $pesoPrato, PDO::PARAM_STR);
        $stmt->bindValue(':imagemPrato', $imagemPrato, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>
