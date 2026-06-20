<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (empty($_SESSION['utilisateur']) || $_SESSION['utilisateur']['role'] != 1) {
    header('Location: ../public/login.php');
    exit;
}

include '../includes/view_tickets.php';
include '../elements/header.php';

?>

<!--LISTE DES BILLETS-->
<div>
    <h2>Liste des billets</h2>
    <div class='ticket-list'>
        <?php
        //$billets apparait comme ayant une erreur dans le code. Le code fonctionne tout de même.
        foreach($billets as $billet){
            echo '<li>
            <ul>
            Identifiant du salarié : '. $billet['nom_utilisateur'].'
            </ul>
            <ul>
            Type de billet : '. $billet['type_billet'].'
            </ul>
            <ul>
            Heure de début : '. $billet['heure_debut'].'
            </ul>
            <ul>
            Heure de fin : '. $billet['heure_fin'].'
            </ul>
            </li>';
        } ?>

</div>
</div>