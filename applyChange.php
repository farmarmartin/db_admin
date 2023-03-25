<?php
require('dbh.php');
require('getSql.php');




if (isset($_POST['new_value'])){
    $post_data = explode("=", $_POST['post_data']);
    $id = $post_data[0];
    $column = $post_data[1];
    $data = $post_data[2];
    $new_value = $_POST['new_value'];

    $updateSql = new Dotaz('update', 'let', $column, "$new_value", "id='$id'");
    $db->query($updateSql->getRequest());
    //echo $updateSql->getRequest();
    header('Location: table.php');
}

if(isset($_POST['vlozit'])){
    $id = $_POST['id'];
    $terminal = $_POST['terminal'];
    $gate = $_POST['gate'];
    $letadlo = $_POST['letadlo'];

    $insert = new Dotaz('insert', 'let', '(id, terminal, gate, letadlo)', "('$id', '$terminal', '$gate', '$letadlo')");
    $db->query($insert->getRequest());
    header('Location: table.php');
}

if(isset($_POST['yes-delete'])){
    $post_data = explode("=", $_POST['post_data']);
    $column = $post_data[0];
    $data = $post_data[1];

    $delSql = new Dotaz('delete', 'let', NULL, NULL, "$column='$data'");
    $db->query($delSql->getRequest());
    header('Location: table.php');

}elseif(isset($_POST['no-delete'])){
    header("Location: table.php");
}
