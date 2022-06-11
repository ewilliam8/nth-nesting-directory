<?php
$method = $_SERVER['REQUEST_METHOD'];

$q = $_GET['q'];
$params = explode('/', $q);

$type = $params[0];
$id = $params[1];

switch($method) {
    case "GET":
        if($type === "chapter") {
            if(isset($id)) {
                getPost($connect, 'chapter', $id);
            } else {
                getPosts($connect, 'chapter');
            }
        }
        elseif ($type === "elem") {
            if(isset($id)) {
                getPost($connect, 'elem', $id);
            } else {
                getPosts($connect, 'elem');
            }
        }
        break;

    case "POST":
        if($type === "chapter") {
            if(isset($id)) {
                addPost($connect, 'chapter', $_POST);
            }
        }
        elseif ($type === "elem") {
            if(isset($id)) {
                addPost($connect, 'elem', $_POST);
            }
        }
        break;

    case "PATCH":
        if($type === "chapter") {
            if(isset($id)) {
                $data = file_get_contents('php://input');
                $data = json_decode($data, true);
                updatePost($connect, 'chapter', $id, $data);
            }
        }
        elseif ($type === "elem") {
            if(isset($id)) {
                $data = file_get_contents('php://input');
                $data = json_decode($data, true);
                updatePost($connect, 'elem', $id, $data);
            }
        }
        break;

    case "DELETE":
        if($type === "chapter") {
            if(isset($id)) {
                deletePost($connect, 'chapter', $id);
            }
        }
        elseif ($type === "elem") {
            if(isset($id)) {
                deletePost($connect, 'elem', $id);
            }
        }
        break;
}