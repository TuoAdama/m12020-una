<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Entities;

use App\Database;
use PDO;

class Enseignant {
    
    private $bdd;
    
    public function __construct() {
        $this->bdd = Database::getInstance();
    }
   
    public function insert($value) {
        $q = "INSERT INTO una_enseignants (matricule, nom, prenoms, date2naissance,"
                . " lieu2naissance, date_creation, date_modification) VALUES (?, ?, ?, ?, ?, NOW(), NOW())";
        $stmt = $this->bdd->prepare($q);
        return $stmt->execute($value);
    }
    
    public function selectByMatricule($matricule){
        $q = "SELECT * FROM una_enseignants WHERE matricule = ?";
        $stmt = $this->bdd->prepare($q);
        $stmt->execute([$matricule]);
        return $stmt->fetch();
    }
    
    public function selectAll() {
        $q = "SELECT * FROM una_enseignants";
        $stmt = $this->bdd->query($q);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
