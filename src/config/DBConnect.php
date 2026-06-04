<?php
declare(strict_types=1);

namespace App\src\config;

use PDO;

class DBConnect {

    // Création d'une classe singleton qui permet de se connecter à la base de données.
    // On crée une instance de la classe DBConnect qui permet de se connecter à la base de données.
    private static $instance;

    private $db;

    /**
     * Constructeur de la classe DBManager.
     * Initialise la connexion à la base de données.
     * Ce constructeur est privé. Pour récupérer une instance de la classe, il faut utiliser la méthode getInstance().
     */
    private function __construct() 
    {
        // On se connecte à la base de données.
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    /**
     * Méthode qui permet de récupérer l'instance de la classe DBManager.
     * @return DBManager
     */
    public static function getInstance() : DBConnect
    {
        if (!self::$instance) {
            self::$instance = new DBConnect();
        }
        return self::$instance;
    }

    /**
     * Méthode qui permet de récupérer l'objet PDO qui permet de se connecter à la base de données.
     * @return PDO
     */
    public function getPDO() : PDO
    {
        return $this->db;
    }
}