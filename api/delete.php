<?php

function delete($id, $database){
    $delete = new Dotaz('delete', 'let', '', '', 'id='.$id);
    $database->query($delete->getRequest());
}

?>