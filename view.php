<?php
    include_once("templates/header.php");
    include_once("helpers/return-tasks.php");

    $data = $_POST;
?>

<div class="view__page">
    <?php include_once("templates/backbtn.html") ?>
    <form action="./helpers/processing-data.php" class="view__content" method="POST">
        <input type="hidden" name="type" value = "view">
        <input type="hidden" name="id" value="<?=$data["id"]?>">
        <div class="form-group">
            <label for="nome">Task</label>
            <input type="text" class="form-control" id="nome" name= "nome" value="<?=$data["nome"]?>">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" id="status" name= "status" value="<?=$data["task_status"] == 1 ? "Complete" : "Incomplete" ?>">
        </div>
    </form>
</div>