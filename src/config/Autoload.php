<?php
declare(strict_types=1);
/**
* Autoload system.
* Whenever PHP needs a class, it will call this function
* and search the various directories (here models, controllers, views) to see if it finds
* a file with the correct name. If so, it includes it with require_once.
*/
spl_autoload_register('Autoload');

function Autoload($className) {

    $path = str_replace('\\', '/', $className);
    $fullPath = "src/$path.php";

    if (file_exists($fullPath)) {
        require_once($fullPath);

    } else {
        throw new Exception("$className $fullPath");
    }
}