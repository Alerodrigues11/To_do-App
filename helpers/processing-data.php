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

    } else if($data["type"] === "view")
    {
        
    } else if($data["type"] === "edit")
    {   
        // EDIT
        
        $id = $data["id"];
        $nome = $data["nome"];

        $query = "UPDATE todo SET nome = :nome WHERE id = :id";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":id", $id);

        try {

            $stmt->execute();
            
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo "Erro: $error";
        }

    } else if($data["type"] === "delete")
    {   
        // DELETE

        $id = $data["id"];

        $query = "DELETE FROM todo WHERE id = :id";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);

        try {

            $stmt->execute();
            
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo "Erro: $error";
        }

    }
    
    header("Location: "."../index.php");
}