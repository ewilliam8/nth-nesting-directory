<?php
require 'frontend/functions.php';
require "database.php";

/** DEVELOPMENT **/
require "dev-functions.php";

/** data handler **/
if(!empty($_POST)) {
    $db = new Database();
    $con = $db->connect();
}

if(isset($_POST['addChapter'])) {
    $title = $_POST['addChapter'];
    $desc  = $_POST['desc'];

    $updated_at = date("Y-m-d H:i:s");
    $created_at = date("Y-m-d H:i:s");

    $db->create('chapter', array($title, $desc, $created_at, $updated_at, -1), 'title, description, created_at, updated_at, parent_id');
}

?>

<!doctype html>
<html lang="ru-RU">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="frontend/web/css/style.css">
</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-6">
                <?php require 'frontend/web/modules/navigation.php'?>
            </div>
            <div class="col-3">
                <?php require 'frontend/web/modules/control.php'?>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script type="module" src="frontend/web/js/main.js"></script>
    </body>
</html>
