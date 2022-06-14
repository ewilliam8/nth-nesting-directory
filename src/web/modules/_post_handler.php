<?php

if(!empty($_POST)) {
    $db = new Database();
    $con = $db->connect();

    if(isset($_POST['addChapter'])) {
        $title = $_POST['addChapter'];
        $desc  = $_POST['desc'];
        $parent_id = $_POST['parent_id'];

        $updated_at = date("Y-m-d H:i:s");
        $created_at = date("Y-m-d H:i:s");

        $db->create('chapter', array($title, $desc, $created_at, $updated_at, $parent_id), 'title, description, created_at, updated_at, parent_id');
    }

    if(isset($_POST['addElem'])) {
        $title = $_POST['addElem'];
        $parent_id = $_POST['parent_id'];

        $updated_at = date("Y-m-d H:i:s");
        $created_at = date("Y-m-d H:i:s");

        $db->create('elem', array($title, $created_at, $updated_at, $parent_id), 'title, created_at, updated_at, parent_id');
    }

    if(isset($_POST['deleteChapter'])) {
        $id = $_POST['deleteChapter'];

        if($id != -1) {
            $db->delete('chapter', 'id='.$id);
            $db->delete('chapter', 'parent_id='.$id);
            $db->delete('elem', 'parent_id='.$id);
        }
    }

    if(isset($_POST['deleteElem'])) {
        $id = $_POST['deleteElem'];

        if($id != -1) {
            $db->delete('elem', 'id='.$id);
        }
    }

    if(isset($_POST['changeChapter'])) {
        $id = $_POST['id'];
        if($id != -1) {
            $title = $_POST['changeChapter'];
            $desc = $_POST['desc'];
            $parent_id = $_POST['parent_id'];

            $db->update('chapter', array('title' => $title, 'updated_at' => date("Y-m-d H:i:s"), 'description' => $desc, 'parent_id' => $parent_id), array('id', $id), '=');
        }
    }

    if(isset($_POST['changeElem'])) {
        $id = $_POST['id'];
        if($id != -1) {

            $title = $_POST['changeChapter'];
            $desc = $_POST['desc'];
            $parent_id = $_POST['parent_id'];
            $db->update('chapter', array('title' => $title, 'updated_at' => date("Y-m-d H:i:s"), 'description' => $desc, 'parent_id' => $parent_id), array('id', $id), '=');
        }
    }

}
