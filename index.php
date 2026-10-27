<?php

if ($_GET)
{
    $controller = $_GET["controller"];
    $method = $_GET["method"];

    require_once "src/controllers/$controller.class.php";
    $object = new $controller();
    $object->$method();

    
}
else{
    require_once "src/controllers/initController.class.php";
    $object = new initController();
    $object->financialInit();
}

?>