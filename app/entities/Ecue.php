<?php
namespace App\Entities;
use \App\Database;
use \PDO;

class Ecue {
    
    private $bdd;
    
    public function __construct() {
        $this->bdd = Database::getInstance();
    }
   
    public function insert($value) {
        $query = "INSERT INTO una_ecues (ue, code, libelle, CM, TD, TP, credit, date_creation, date_modification) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";
        $stmt = $this->bdd->prepare($query);
        return $stmt->execute($value);
    }
    
    public function selectAll() {
        $query = "SELECT * FROM una_ecues";
        $stmt = $this->bdd->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}