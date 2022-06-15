<?php
require 'modals.php';
?>

<h1>Control</h1>

<div class="container">
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#add_chapter">
                Добавить раздел
            </button>
        </div>
        <div class="col">
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                    data-bs-target="#change_chapter">Изменить раздел
            </button>
        </div>
    </div>
</div>

<hr/>

<div class="container">
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#add_elem">
                Добавить элемент
            </button>
        </div>
        <div class="col">
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#change_elem">
                Изменить элемент
            </button>
        </div>
    </div>
</div>

<hr/>

<div class="container">
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                    data-bs-target="#delete_chapter">Удалить раздел
            </button>
        </div>
        <div class="col">
            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete_elem">
                Удалить элемент
            </button>
        </div>
    </div>
</div>

<hr/>

<form method="post" action="insert.php">
    <input name="sort_az" class="btn btn-outline-secondary ml-3" type="submit" value="Сортировать имена (а - я)">
</form>

<hr/>

<form method="post" action="insert.php">
    <input name="sort_time" class="btn btn-outline-secondary ml-3" type="submit" value="Сортировать по времени">
</form>