<?php
    require 'modals.php';
?>

<h1>Control</h1>

<div class="container">
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addChapter">Добавить раздел</button>
        </div>
        <div class="col">
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#changeChapter">Изменить раздел</button>
        </div>
    </div>
</div>

<hr/>

<div class="container">
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addElem">Добавить элемент</button>
        </div>
        <div class="col">
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#changeElem">Изменить элемент</button>
        </div>
    </div>
</div>

<hr/>

<div class="container">
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteChapter">Удалить раздел</button>
        </div>
        <div class="col">
            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteElem">Удалить элемент</button>
        </div>
    </div>
</div>

<hr/>

<form method="post" action="insert.php">
    <!--    TODO unsort-->
    <input name="sort" class="btn btn-outline-secondary ml-3" type="submit" value="Сортировать имена (а - я)">
</form>
