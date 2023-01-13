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

    <!--- CSS --->
    <link rel="stylesheet" href="css/styles.css">

    <!--- BOOTSTRAP --->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>

    <div class="register__content">
        <form action="./helpers/processing-data.php" method="POST">
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
                        <form action="./helpers/change-status.php" method="POST">
                            <input type="hidden" name="nome" value="<?=$task["nome"]?>">
                            <input type="hidden" name="status" value="<?=$task["task_status"]?>">
                            <input type="hidden" name="id" value="<?=$task["id"]?>">
                            <input type="checkbox" <?php echo $task["task_status"] ? 'checked' : '' ?>>
                            <?=$task["nome"]?>
                        </form>
                    </td>
                    <td class="table__action">
                        <form action="view.php" method="POST">
                            <input type="hidden" name="type" value = "view">
                            <button type="submit" class="btn btn-primary">View</button>
                        </form>
                        <form action="edit.php" method="POST">
                            <input type="hidden" name="type" value = "edit">
                            <button type="submit" class="btn btn-warning">Edit</button>
                        </form>
                        <form action="./helpers/processing-data.php" method="POST">
                            <input type="hidden" name="type" value = "delete">
                            <input type="hidden" name="id" value="<?=$task["id"]?>">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

<script src="js/script.js"></script>
</body>
</html>