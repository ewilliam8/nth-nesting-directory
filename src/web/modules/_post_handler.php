<?php

if(!empty($_POST)) {
    $db = new Database();
    $con = $db->connect();

    if(isset($_POST['addChapter'])) {
        $title = htmlspecialchars($_POST['addChapter']);
        $desc  = htmlspecialchars($_POST['desc']);
        $parent_id = htmlspecialchars($_POST['parent_id']);

        $updated_at = date("Y-m-d H:i:s");
        $created_at = date("Y-m-d H:i:s");

        $db->create('chapter', array($title, $desc, $created_at, $updated_at, $parent_id), 'title, description, created_at, updated_at, parent_id');
    }

    if(isset($_POST['addElem'])) {
        $title = htmlspecialchars($_POST['addElem']);
        $parent_id = htmlspecialchars($_POST['parent_id']);

        $updated_at = date("Y-m-d H:i:s");
        $created_at = date("Y-m-d H:i:s");

        $db->create('elem', array($title, $created_at, $updated_at, $parent_id), 'title, created_at, updated_at, parent_id');
    }

    if(isset($_POST['deleteChapter'])) {
        $id = htmlspecialchars($_POST['deleteChapter']);

        if($id != -1) {
            $db->delete('chapter', 'id='.$id);
            $db->delete('chapter', 'parent_id='.$id);
            $db->delete('elem', 'parent_id='.$id);
        }
    }

    if(isset($_POST['deleteElem'])) {
        $id = htmlspecialchars($_POST['deleteElem']);

        if($id != -1) {
            $db->delete('elem', 'id='.$id);
        }
    }

    if(isset($_POST['changeChapter'])) {
        $id = htmlspecialchars($_POST['id']);
        if($id != -1) {
            $title = htmlspecialchars($_POST['changeChapter']);
            $desc = htmlspecialchars($_POST['desc']);
            $parent_id = htmlspecialchars($_POST['parent_id']);

            $db->update('chapter', array('title' => $title, 'updated_at' => date("Y-m-d H:i:s"), 'description' => $desc, 'parent_id' => $parent_id), array('id', $id), '=');
        }
    }

    if(isset($_POST['changeElem'])) {
        $id = htmlspecialchars($_POST['id']);
        if($id != -1) {

            $title = htmlspecialchars($_POST['changeChapter']);
            $desc = htmlspecialchars($_POST['desc']);
            $parent_id = htmlspecialchars($_POST['parent_id']);
            $db->update('chapter', array('title' => $title, 'updated_at' => date("Y-m-d H:i:s"), 'description' => $desc, 'parent_id' => $parent_id), array('id', $id), '=');
        }
    }

}
