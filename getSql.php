<?php
class Dotaz{
    private $type, $location, $target, $value, $condition;

    public function __construct($type, $location, $target = NULL, $value = NULL, $condition = NULL){
        $this->type = $type;
        $this->location = $location;
        $this->target = $target;
        $this->value = $value;
        $this->condition = $condition;
    }

    public function getRequest(){
        switch($this->type){
            case 'select':
                return "SELECT $this->target FROM $this->location;";
            case 'update':
                return "UPDATE $this->location SET $this->target = '$this->value' WHERE $this->condition;";
            case 'delete':
                return "DELETE FROM $this->location WHERE $this->condition;";
            case 'insert':
                return "INSERT INTO $this->location $this->target VALUES $this->value";
        }
    }
}
//$dotaz = new Dotaz('update', 'let', 'id', 4, 'id=1');
//echo($dotaz->getRequest());
?>