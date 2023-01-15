<?php
    include_once("templates/header.php");
    include_once("helpers/return-tasks.php");

    $data = $_POST;
?>

<div class="edit__page">
    <?php include_once("templates/backbtn.html") ?>
    <form action="./helpers/processing-data.php" class="edit__content" method="POST">
        <input type="hidden" name="type" value = "edit">
        <input type="hidden" name="id" value="<?=$data["id"]?>">
        <div class="form-group">
            <label for="nome">Task</label>
            <input type="text" class="form-control" id="nome" name= "nome" value="<?=$data["nome"]?>">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>