<?php

require '../vendor/autoload.php';


header('Content-Type: application/json; charset=utf-8');
$errors = [];


extract($_POST);

$ens = new App\Entities\Enseignant();

if(empty($matricule)){
    $errors['matricule'] = "Veuillez entrer votre numéro matricule";
}elseif($ens->selectByMatricule($matricule)){
    $errors['matricule'] = "Le numéro matricule existe déjà";
}

if(empty($nom)){
    $errors['nom'] = "Veuillez entrer votre nom";
}

if(empty($prenoms)){
    $errors['prenom'] = "Veuillez entrer votre nom";
}

if(empty($date)){
    $errors['date'] = "Veuillez preciser votre date de naissance";
}
if(empty($lieu)){
    $errors['lieu'] = "Veuillez preciser votre lieu de naissance";
}


if(empty($errors)){
    $ens->insert([$matricule, $nom, $prenoms,$date, $lieu]);
    $msg = ["type" => "success"];
    echo json_encode($msg);
}else{
    echo json_encode($errors);
}