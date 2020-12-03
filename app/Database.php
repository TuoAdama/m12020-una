<?php
namespace App;
use \PDO;

class Database {
    
    const HOST  = "localhost";
    const DATABASE = "gestion";
    const USER = "root";
    const PASSWORD = "";
    
    private static $bdd;
    
    
    public static function getInstance() {
            
            if(is_null(self::$bdd)){
                
                $dsn = 'mysql:host='.self::HOST.';dbname='.self::DATABASE.';charset=utf8';
                
                try {
                    self::$bdd = new PDO($dsn, self::USER, self::PASSWORD);
                    self::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    die('Erreur : ' . $e->getMessage());
                }
            }
            
            return self::$bdd;
    }
    
}
