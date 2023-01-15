<?php
    include_once("templates/header.php");
    include_once("helpers/processing-data.php");
    include_once("helpers/return-tasks.php");
?>
<div>
    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Tasks</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Complete</button>
        </li>
    </ul>
        <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
        <div class="main__content">
            <div class="register__content">
                <form action="./helpers/processing-data.php" method="POST">
                    <input type="text" name="nome" placeholder="Insira sua task">
                    <input type="hidden" name="type" value = "create">
                    <button>Registre</button>
                </form>
            </div>
            <?php if(empty($tasks)): ?>
                <div class="alert alert-secondary" role="alert">
                    Você não possui nenhuma task registrada
                </div>
            <?php else: ?>
            <div class="table__content">
                <table class="table table-bordered">
                    <thead class="table-info">
                        <tr>
                            <th class="table__tasks">Task</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($tasks as $task): ?>
                        <?php if($task["task_status"] == 0): ?>
                        <tr>
                            <td class="table__tasks">
                                <form action="./helpers/change-status.php" method="POST">
                                    <input type="hidden" name="nome" value="<?=$task["nome"]?>">
                                    <input type="hidden" name="status" value="<?=$task["task_status"]?>">
                                    <input type="hidden" name="id" value="<?=$task["id"]?>">
                                    <input type="checkbox" <?php echo $task["task_status"] ? 'checked' : '' ?>>
                                    <p><?=$task["nome"]?></p>
                                </form>
                            </td>
                            <td class="table__action">
                                <form action="view.php" method="POST">
                                    <input type="hidden" name="nome" value="<?=$task["nome"]?>">
                                    <input type="hidden" name="id" value="<?=$task["id"]?>">
                                    <input type="hidden" name="task_status" value="<?=$task["task_status"]?>">
                                    <button type="submit" class="btn btn-primary">View</button>
                                </form>
                                <form action="edit.php" method="POST">
                                    <input type="hidden" name="nome" value="<?=$task["nome"]?>">
                                    <input type="hidden" name="id" value="<?=$task["id"]?>">
                                    <button type="submit" class="btn btn-warning">Edit</button>
                                </form>
                                <form action="./helpers/processing-data.php" method="POST">
                                    <input type="hidden" name="type" value = "delete">
                                    <input type="hidden" name="id" value="<?=$task["id"]?>">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php endif ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            </div>  
        </div>
        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
        <div class="main__content">
            <h1 class="main__content__title">Tasks Realizadas</h1>
            <div class="table__content">
                <table class="table table-bordered">
                    <thead class="table-info">
                        <tr>
                            <th class="table__tasks">Task</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($tasks as $task): ?>
                        <?php if($task["task_status"] == 1): ?>
                        <tr>
                            <td class="table__tasks table__tasks__true">
                                <form action="./helpers/change-status.php" method="POST">
                                    <input type="hidden" name="nome" value="<?=$task["nome"]?>">
                                    <input type="hidden" name="status" value="<?=$task["task_status"]?>">
                                    <input type="hidden" name="id" value="<?=$task["id"]?>">
                                    <input type="checkbox" <?php echo $task["task_status"] ? 'checked' : '' ?>>
                                    <p><?=$task["nome"]?></p>
                                </form>
                            </td>
                            <td class="table__action">
                                <form action="view.php" method="POST">
                                    <input type="hidden" name="nome" value="<?=$task["nome"]?>">
                                    <input type="hidden" name="id" value="<?=$task["id"]?>">
                                    <input type="hidden" name="task_status" value="<?=$task["task_status"]?>">
                                    <button type="submit" class="btn btn-primary">View</button>
                                </form>
                                <form action="edit.php" method="POST">
                                    <input type="hidden" name="nome" value="<?=$task["nome"]?>">
                                    <input type="hidden" name="id" value="<?=$task["id"]?>">
                                    <button type="submit" class="btn btn-warning">Edit</button>
                                </form>
                                <form action="./helpers/processing-data.php" method="POST">
                                    <input type="hidden" name="type" value = "delete">
                                    <input type="hidden" name="id" value="<?=$task["id"]?>">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php endif ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
        <?php endif ?>  
    </div>
</div>
    <!--- Javascript to a specific function --->
    <script src="js/script.js"></script>
    
    <!--- Javascript from Bootstrap --->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

