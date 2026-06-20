<?php

if(isset($_SESSION)){
    session_destroy();
}
session_start();

require_once 'database.php';

$erreurs = [];

//Vérifications AJAX au lieu de php à cause du système de code PIN
// Handle AJAX credential validation
if (isset($_POST['validate_credentials']) && $_POST['validate_credentials'] === 'true') {
    $data = $_POST;
    $data['nom_utilisateur'] = trim($data['nom_utilisateur']);
    $data['mot_de_passe'] = trim($data['mot_de_passe']);

    header('Content-Type: application/json');

    if (empty($data['nom_utilisateur'])) {
        echo json_encode(['valid' => false, 'message' => 'Veuillez saisir votre identifiant.']);
        exit;
    }
    if (empty($data['mot_de_passe'])) {
        echo json_encode(['valid' => false, 'message' => 'Veuillez saisir votre mot de passe.']);
        exit;
    }

    $requete = $connexion->prepare('SELECT * FROM utilisateur WHERE nom = :nom_utilisateur');
    $requete->bindParam('nom_utilisateur', $data['nom_utilisateur']);
    $requete->execute();
    $utilisateur = $requete->fetch(\PDO::FETCH_ASSOC);

    if ($utilisateur === false) {
        echo json_encode(['valid' => false, 'message' => 'Compte non valide.']);
        exit;
    }

    if ($data['mot_de_passe'] == $utilisateur['mot_de_passe']) {
        echo json_encode(['valid' => true]);
    } else {
        echo json_encode(['valid' => false, 'message' => 'Mot de passe invalide.']);
    }
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = $_POST;

    // Suppression des espaces avant/après pour les différentes données
    $data['nom_utilisateur'] = trim($data['nom_utilisateur']);
    $data['mot_de_passe'] = trim($data['mot_de_passe']);
    $data['code_pin'] = trim($data['code_pin']);

    //Vérifications des champs obligatoires
    if (empty($data['nom_utilisateur'])) {
        $erreurs['nom_utilisateur'] = 'Veuillez saisir votre identifiant.';
    }
    if (empty($data['mot_de_passe'])) {
        $erreurs['mot_de_passe'] = 'Veuillez saisir votre mot de passe.';
    }
    if (empty($data['code_pin'])) {
        $erreurs['code_pin'] = 'Veuillez saisir votre code PIN.';
    }


    $requete = $connexion->prepare('
        SELECT *
        FROM utilisateur
        WHERE nom = :nom_utilisateur');

    $requete->bindParam('nom_utilisateur', $data['nom_utilisateur']);
    $requete->execute();
    $utilisateur = $requete->fetch(\PDO::FETCH_ASSOC);



        if ($utilisateur === false) {
            $erreurs['nom_utilisateur'] = 'Compte non valide.';

        } else {
            if ($data['mot_de_passe'] == $utilisateur['mot_de_passe']) {
                // On créé une session avec les données de l'utilisateur.
                $_SESSION['utilisateur'] = [
                    'id' => $utilisateur['id'],
                    'nom' => $utilisateur['nom'],
                    'id_pin' => $utilisateur['id_pin'],
                    'role' => $utilisateur['role']
                ];
                //On vérifie si le code pin est correct.
                $requete = $connexion->prepare('
                SELECT *
                FROM pin
                WHERE code = :code_pin');

                $requete->bindParam('code_pin', $data['code_pin']);
                $requete->execute();
                $pin = $requete->fetch(\PDO::FETCH_ASSOC);

                if($pin != null && $pin['id'] == $_SESSION['utilisateur']['id_pin']){
                    // On redirige l'utilisateur sur sa page d'accueil respective.
                    if ($utilisateur['role'] === 1) {
                        header('Location: ../admin/home.php'); //Page utilisateur
                    } else {
                        header('Location: home.php'); //Page admin
                    }
                    exit;
                } else {
                    $erreurs['code_pin'] = 'Code pin invalide';
                }
            } else {
                $erreurs['mot_de_passe'] = 'Mot de passe invalide.';
            }
        }
    }