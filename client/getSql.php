<?php
class Dotaz{
    private $type, $location, $target, $value, $where;

    public function __construct($type, $location, $target, $value = NULL, $where = NULL){
        $this->type = $type;
        $this->location = $location;
        $this->target = $target;
        $this->value = $value;
        $this->where = $where;
    }

    public function getRequest(){
        switch($this->type){
            case 'select':
                return "SELECT $this->target FROM $this->location;";
            case 'update':
                return "UPDATE $this->location SET $this->target = $this->value WHERE $this->where;";
            case 'delete':
                return "DELETE FROM $this->location WHERE $this->where;";
        }
    }
}
//$dotaz = new Dotaz('update', 'let', 'id', 4, 'id=1');
//echo($dotaz->getRequest());
?>