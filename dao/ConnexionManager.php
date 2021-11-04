<?php
class ConnexionManager extends PDO {
    const HOST = 'localhost';
    const DB = 'CarnetAdressesJava';
    const USER = 'magash';
    const PASS = 'fabisami';
    
    //SINGLETON
    private static $instance = null;

    private function __construct() {
        //$this->connect();
        echo 'ça fonctionne';
    }

    public static function getInstance() {
        if (is_null(self::$instance)) {
            try {
                self::$instance = new PDO('mysql:host='.self::HOST.';dbname='.self::DB.';charset=utf8', self::USER, self::PASS);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Exception $e) {
                echo 'Erreur : ' . $e->getMessage() . '<br />';
                echo 'N° : ' . $e->getCode();
                die('Fin du script');
            }
        }
        return self::$instance;
    }

    public function getDb() {
        return $this->db;
    }

    public function setDb($objectPDO) {
        $this->db = $objectPDO;
    }
}