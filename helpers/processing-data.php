<?php
    session_start();

    include_once("conn-mysql.php");

    $data = $_POST;
    $dataName = $data["nome"] ?? '';
    $dataName = trim($dataName);

if(!empty($data)) 
{
    // CREATE
    
    if($data["type"] === "create" && !empty($dataName))
    {
        $nome = $dataName;

        $query = "INSERT INTO todo (nome) VALUES (:nome)";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":nome", $nome);

        try {

            $stmt->execute();
            $_SESSION["msg"] = "Task adicionada com sucesso!";

        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo "Erro: $error";
        }

    }
    
    header("Location: "."../index.php");
}