<?php

require_once '../includes/database.php';

$requete = $connexion->prepare('
        SELECT heure_debut, heure_fin, u.nom as nom_utilisateur, t.nom as type_billet
        FROM billet as b, utilisateur as u, type as t
        WHERE b.utilisateur = u.id AND b.type = t.id');
    $requete->execute();
    $billets = $requete->fetchAll(\PDO::FETCH_ASSOC);