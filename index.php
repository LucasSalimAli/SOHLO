<?php

if ($_GET)
{
    $controller = $_GET["controller"];
    $method = $_GET["method"];
    $origin = $_GET["origin"] ?? "";

    require_once "src/controllers/$controller.class.php";
    $object = new $controller();
    $object->$method($origin);

    
}
else{
    require_once "src/controllers/InitController.class.php";
    $object = new InitController();
    $object->Init();
}

?>