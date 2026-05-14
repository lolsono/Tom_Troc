<?php
declare(strict_types=1);
/**
 * Système d'autoload. 
 * A chaque fois que PHP va avoir besoin d'une classe, il va appeler cette fonction 
 * et chercher dnas les divers dossiers (ici models, controllers, views ) s'il trouve 
 * un fichier avec le bon nom. Si c'est le cas, il l'inclut avec require_once.
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