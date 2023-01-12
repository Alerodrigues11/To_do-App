<?php
    include_once("helpers/conn-mysql.php");
    include_once("helpers/processing-data.php");


    // Return all the tasks
    
    $tasks = [];
    
    $query = "SELECT * FROM todo";
    
    $stmt = $conn->prepare($query);
    
    $stmt->execute();
    
    $tasks = $stmt->fetchAll();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>

    <!--- BOOTSTRAP --->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>

    <div class="register__content">
        <form action="./helpers/process-data.php" method="POST">
            <input type="text" name="nome" placeholder="Insira sua task">
            <input type="hidden" name="type" value = "create">
            <button>Registre</button>
        </form>
    </div>


    <div class="table__content">
        <table class="table">
            <thead class="table-info">
                <tr>
                    <th>Task</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($tasks as $task): ?>
                <tr>
                   
                    <td>
                        <input type="checkbox" <?php echo $task["task_status"] ? 'checked' : '' ?>>
                        <?=$task["nome"]?>
                    </td>
                    <td>
                        <a href="#">View</a>
                        <a href="#">Editar</a>
                        <a href="#">Deletar</a>
                    </td>
                    
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>
</html>