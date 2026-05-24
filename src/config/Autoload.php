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

    // project root location
    $baseDir = __DIR__ . '/../../';

    if (strpos($className, 'App\\') === 0) {
        
        $path = substr($className, 4);
        $file = $baseDir . str_replace('\\', '/', $path) . '.php';

        $file = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $file);

        if (file_exists($file)) {
            require_once($file);
            return;
        }
    }

    throw new Exception("Class $className not found in $file");
}