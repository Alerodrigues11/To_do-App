<?php
    include_once("helpers/conn-mysql.php");

    // Return all the tasks
    
    $tasks = [];
    
    $query = "SELECT * FROM todo";
    
    $stmt = $conn->prepare($query);
    
    $stmt->execute();
    
    $tasks = $stmt->fetchAll();
    