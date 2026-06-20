<?php

$requete = $connexion->prepare('
        SELECT *
        FROM type');
    $requete->execute();
    $types = $requete->fetch(\PDO::FETCH_ASSOC);