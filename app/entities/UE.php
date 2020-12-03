<?php
namespace App\Entities;

use App\Database;
use PDO;

class UE {
    
    private $bdd;
    
    public function __construct() {
        $this->bdd = Database::getInstance();
    }
   
    public function insert($value) {
        $query = "INSERT INTO una_ues (code, libelle, date_creation, date_modification) VALUES (?, ?, NOW(), NOW())";
        $stmt = $this->bdd->prepare($query);
        return $stmt->execute($value);
    }
    
    public function selectByCodeUE($codeUE){
        $query = "SELECT * FROM una_ues WHERE code = ?";
        $stmt = $this->bdd->prepare($query);
        $stmt->execute([$codeUE]);
        return $stmt->fetch();
    }
    
    public function selectAll() {
        $query = "SELECT * FROM una_ues";
        $stmt = $this->bdd->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}