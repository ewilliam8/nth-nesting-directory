<?php
require 'frontend/functions.php';
require "database.php";

?>

<!doctype html>
<html lang="en">
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
        <div class="col-3">
            <?php require 'frontend/web/modules/panel.php'?>
        </div>
    </div>
</div>

<script type="module" src="frontend/web/js/main.js"></script>
</body>
</html>
