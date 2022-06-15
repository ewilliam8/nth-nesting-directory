<?php

if (!empty($_POST)) {
    $db = new Database();
    $con = $db->connect();

    if (isset($_POST['add_chapter'])) {
        $title = htmlspecialchars((string)$_POST['add_chapter']);
        $desc = htmlspecialchars((string)$_POST['desc']);
        $parent_id = htmlspecialchars((int)$_POST['parent_id']);

        $updated_at = date("Y-m-d H:i:s");
        $created_at = date("Y-m-d H:i:s");

        $db->create('chapter', array($title, $desc, $created_at, $updated_at, $parent_id), 'title, description, created_at, updated_at, parent_id');
    }

    if (isset($_POST['add_elem'])) {
        $title = htmlspecialchars((string)$_POST['add_elem']);
        $parent_id = htmlspecialchars((int)$_POST['parent_id']);

        $updated_at = date("Y-m-d H:i:s");
        $created_at = date("Y-m-d H:i:s");

        $db->create('elem', array($title, $created_at, $updated_at, $parent_id), 'title, created_at, updated_at, parent_id');
    }

    if (isset($_POST['delete_chapter'])) {
        $id = htmlspecialchars((int)$_POST['delete_chapter']);

        if ($id != -1) {
            $db->delete('chapter', 'id=' . $id);
            $db->delete('chapter', 'parent_id=' . $id);
            $db->delete('elem', 'parent_id=' . $id);
        }
    }

    if (isset($_POST['delete_elem'])) {
        $id = htmlspecialchars((int)$_POST['delete_elem']);

        if ($id != -1) {
            $db->delete('elem', 'id=' . $id);
        }
    }

    if (isset($_POST['change_chapter'])) {
        $id = htmlspecialchars((int)$_POST['id']);
        if ($id != -1) {
            $title = htmlspecialchars((string)$_POST['change_chapter']);
            $desc = htmlspecialchars((string)$_POST['desc']);
            $parent_id = htmlspecialchars((int)$_POST['parent_id']);

            $db->update('chapter', array('title' => $title, 'updated_at' => date("Y-m-d H:i:s"), 'description' => $desc, 'parent_id' => $parent_id), array('id', $id), '=');
        }
    }

    if (isset($_POST['change_elem'])) {
        $id = htmlspecialchars((int)$_POST['id']);
        if ($id != -1) {

            $title = htmlspecialchars((string)$_POST['change_elem']);
            $desc = htmlspecialchars((string)$_POST['desc']);
            $parent_id = htmlspecialchars((int)$_POST['parent_id']);
            $db->update('chapter', array('title' => $title, 'updated_at' => date("Y-m-d H:i:s"), 'description' => $desc, 'parent_id' => $parent_id), array('id', $id), '=');
        }
    }

}
