<?php

function getPosts ($connect, $bd) {
    $posts = mysqli_query($connect, "SELECT * FROM `$bd`");
    $postsList = [];
    while($post = mysqli_fetch_assoc($posts)) {
        $postsList[] = $post;
    }
    echo json_encode($postsList);
}

function getPost($connect, $bd, $id) {
    $post = mysqli_query($connect, "SELECT * FROM `$bd` WHERE `id` = '$id'");

    if(mysqli_num_rows($post) === 0) {
        http_response_code(404);
        $res = [
            "status" => false,
            "message" => "Post not found"
        ];
        echo json_encode($res);
    } else {
        $post = mysqli_fetch_assoc($post);
        echo json_encode($post);
    }
}

function addPost($connect, $bd, $data) {

    $title = $data['title'];
    $body = $data['body'];

    mysqli_query($connect, "INSERT INTO `$bd` (`id`, `title`, `body`) VALUES (NULL, `$title`, `$body`)");
    http_response_code(201);

    $res = [
        "status" => true,
        "post_id" => mysqli_insert_id($connect)
    ];

    echo json_encode($res);
}

function updatePost($connect, $bd, $id, $data) {
    $title = $data['title'];
    $description = $data['description'];

    mysqli_query($connect, "UPDATE `$bd` SET `title` = '$title', `description` = '$description' WHERE `$bd`.`id` = '$id'");
    http_response_code(200);

    $res = [
        "status" => true,
        "message" => "Post is updated"
    ];

    echo json_encode($res);
}

function deletePost ($connect, $bd, $id) {

    mysqli_query($connect, "DELETE FROM `$bd` WHERE `$bd`.`id` = '$id'");
    http_response_code(200);

    $res = [
        "status" => true,
        "message" => "Post is deleted"
    ];

    echo json_encode($res);
}