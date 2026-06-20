<?php

$erreurs = [];
$succes = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = $_POST;

    // Suppression des espaces avant/après pour les différentes données
    $data['heure_debut'] = trim($data['heure_debut']);
    $data['heure_fin'] = trim($data['heure_fin']);
    $data['type'] = trim($data['type']);

    //Vérifications des champs obligatoires
    if(empty($data['heure_debut']) && empty($data['heure_fin'])){
        $erreurs['horaires'] = 'Veuillez saisir au moins une heure de début ou de fin.';
    }
    if(empty($data['type'])){
        $erreurs['type'] = 'Veuillez saisir un type de billet.';
    }
    if(!empty($data['heure_debut']) && !empty($data['heure_fin']) && $data['heure_debut'] > $data['heure_fin']){
        $erreurs['horaires'] = 'L\'heure de fin ne peut pas être supérieure à l\'heure de début.';
    }

    // Construction des datetimes avec la date du jour et l'heure soumise
    $aujourdhui = date('Y-m-d');

    if ($data['heure_debut'] !== '') {
        $date_debut = date('Y-m-d H:i:s', strtotime($aujourdhui . ' ' . $data['heure_debut']));
    } else {
        $date_debut = null;
    }

    if ($data['heure_fin'] !== '') {
        $date_fin = date('Y-m-d H:i:s', strtotime($aujourdhui . ' ' . $data['heure_fin']));
    } else {
        $date_fin = null;
    }


    if (empty($erreurs)) {
        $requeteInsertion = $connexion->prepare('
        INSERT INTO billet(heure_debut, heure_fin, utilisateur, type) VALUES (:heure_debut, :heure_fin, :utilisateur, :type);
        '
        );

        $requeteInsertion->bindParam(':heure_debut', $date_debut);
        $requeteInsertion->bindParam(':heure_fin', $date_fin);
        $requeteInsertion->bindParam(':utilisateur', $_SESSION['utilisateur']['id']);
        $requeteInsertion->bindParam(':type', $data['type']);

        $succes['ajout'] = 'Billet enregistré avec succès !';

        try {
            $requeteInsertion->execute();
            header('Location: home.php');
            exit;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

}
