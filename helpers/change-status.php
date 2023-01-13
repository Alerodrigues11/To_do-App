<?php
    session_start();

    include_once("conn-mysql.php");

    $data = $_POST;

    if(!empty($data)) 
    {
        $nome = $data["nome"];
        $task_status = !$data["status"];
        $id = $data["id"];

        $query = "UPDATE todo SET nome = :nome, task_status = :task_status WHERE id = :id";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":task_status", $task_status);
        $stmt->bindParam(":id", $id);

        try {

            $stmt->execute();

        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo "Erro: $error";
        }

        header("Location: "."../index.php");
    }
    