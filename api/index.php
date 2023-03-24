<?php
//require 'dbh.php';
require 'getSql.php';
// url example: /api/update/let/id/GG5555/id='GG8080'

$url = $_SERVER["REQUEST_URI"];
$parameters = explode("/", $url);


$operation = $parameters[4];
$location = $parameters[5];
$column = $parameters[6];
$content = $parameters[7];
$condition = $parameters[8];


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

        $updateRequest = new Dotaz($parameters[3], $parameters[4], $parameters[5], $parameters[6], /*$parameters[5]."=".$parameters[6]*/ $parameters[7]);
        $this->database->query($updateRequest->getRequest());
        
    }

    public function delete(){
        $url = $_SERVER["REQUEST_URI"];
        $parameters = explode("/", $url);

        $delRequest = new Dotaz($parameters[4], $parameters[5], NULL, NULL, $parameters[8]);
        $this->database->query($delRequest->getRequest());
        //var_dump($delRequest->getRequest());
        //header("Location: ../../../../../../client/table.php");
                             /*NEVŠÍMAT :D*/
    }
}

$action = new manageDB;

if ($operation == 'update'){
    $action->update();
}

if($operation == 'delete'){
    $action->delete();
}
