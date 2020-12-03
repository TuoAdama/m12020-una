<?php
 require '../vendor/autoload.php';
 
$valeurs = ["TUO225","PROLOG"];

$ue = new App\Entities\UE();

$row = $ue->selectAll();