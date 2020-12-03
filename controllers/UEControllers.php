<?php

require '../vendor/autoload.php';

header('Content-Type: application/json');
$errors = [];

$ue = new App\Entities\UE();

if(!empty($_POST['codeUE'])){
    
    if($ue->selectByCodeUE($_POST['codeUE'])){
        $errors['codeUE'] = "Le code UE existe déjà";
    }
}else{
    $errors['codeUE'] = "Veuillez preciser le code de l'UE";
}

if(empty($_POST['libelle'])){
    $errors['libelle'] = "Veuillez preciser le libellé de l'UE";
}

if(empty($errors)){
    
    extract($_POST);
    
    if($ue->insert([$codeUE, $libelle])){
        $msg = ["type" => "success"];
        echo json_encode($msg);
    }
    
}else{
    $errors['type'] = "errors";
    echo json_encode($errors);
}