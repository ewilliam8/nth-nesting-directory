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
</head>
<body>
    <div id="navigation">
        <div id="nav-header">Navigation</div>
        <div id="nav-list">
        <?php

            $db_chap = new Database();
            $db_chap->connect();

            $db_elem = new Database();
            $db_elem->connect();

            $res_chap = $db_chap->select('chapter');
            $res_elem = $db_elem->select('elem');

            function create_tree ($sec, $elem, $parent_id){

                $tree = '<ul>';

                for($i = 0; $i < count($sec); $i++) {
                    if($sec[$i]["parent_id"] == null) {
                        $tree .= "<li>".$sec[$i]['title'];

                        for($k = 0; $k < count($elem); $k++){
                            if($elem[$k]["parent_id"] == $sec[$i]["id"]) {
                                $tree .= "<ul>".$elem[$k]["title"]."</ul>";
                            }
                        }
                        $tree .= '</li>';
                    }
                    elseif ($sec[$i]["parent_id"] == $parent_id) {
                        $tree .= "<li>".$sec[$i]['title'];
                        $tree .=  create_tree ($sec, $elem, $sec[$i]['id']);

                        for($k = 0; $k < count($elem); $k++){
                            if($elem[$k]["parent_id"] == $sec[$i]["id"]) {
                                $tree .= "<ul>".$elem[$k]["title"]."</ul>";
                            }
                        }
                        $tree .= '</li>';
                    }
                }
                $tree .= '</ul>';

                return $tree;
            }

            echo create_tree ($res_chap, $res_elem, -1);
        ?>
        </div>
    </div>

    <script type="module" src="frontend/web/js/main.js"></script>
</body>
</html>
