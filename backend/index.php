<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Credentials: true');
header('Content-type: json/application');
require '../config/Connect_db.php';
require '../api/index.php';
require '../routes/v1/route.php';
?>

