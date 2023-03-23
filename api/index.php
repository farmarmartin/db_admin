<?php
//require 'dbh.php';
require 'getSql.php';
// url example: /api/update/let/id/GG5555/id='GG8080'

$url = $_SERVER["REQUEST_URI"];
$parameters = explode("/", $url);

$operation = $parameters[3];
$location = $parameters[4];
$column = $parameters[5];
$content = $parameters[6];
$condition = $parameters[7];


class manageDB{
    public $database, $operation, $location, $column, $content, $condition;

    function __construct(){
        require 'dbh.php';
        $this->operation = '';
        $this->location = '';
        $this->column = '';
        $this->content = '';
        $this->condition = '';
        $this->database = $db;
    }

    public function update(){
        $url = $_SERVER["REQUEST_URI"];
        $parameters = explode("/", $url);

        $updateRequest = new Dotaz($parameters[4], $parameters[5], $parameters[6], $parameters[7], /*$parameters[5]."=".$parameters[6]*/ $parameters[8]);
        $this->database->query($updateRequest->getRequest());
        //var_dump($updateRequest->getRequest());
        // var_dump($parameters[5]);
    }

    public function delete(){
        $url = $_SERVER["REQUEST_URI"];
        $parameters = explode("/", $url);

        $delRequest = new Dotaz($parameters[4], $parameters[5], NULL, NULL, $parameters[6]);
        //$this->database->query($delRequest->getRequest());
        var_dump($delRequest->getRequest());
    }
}

$action = new manageDB;

if ($operation = 'update'){
    $action->update();
}
elseif($operation = 'delete'){
    $action->delete();
}
