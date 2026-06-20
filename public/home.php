<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (empty($_SESSION['utilisateur']) || $_SESSION['utilisateur']['role'] != 2) {
    header('Location: login.php');
    exit;
}

include '../includes/database.php';
include '../includes/add_ticket.php';
include '../elements/header.php';

$requete = $connexion->prepare('
        SELECT *
        FROM type;');
    $requete->execute();
    $types = $requete->fetchAll(\PDO::FETCH_ASSOC);

?>

<!--FORMULAIRE DE POINTAGE-->
<div>
    <h2>Enregistrer un billet</h2>
    <form action='' method="POST">
        <?php
            if (!empty($erreurs['horaires'])) {
                echo "<j class='erreur'>{$erreurs['horaires']}</j></br>";
            }
        ?>
        <label for='heure_debut'>Heure de début :</label>
        <input type='time' name='heure_debut' id='heure_debut'/>

        <label for='heure_fin'>Heure de fin :</label>
        <input type='time' name='heure_fin' id='heure_fin'/>

        <label for='type'>Arrivée/Départ :*</label>
        <?php
            if (!empty($erreurs['type'])) {
                echo "<j class='erreur'>{$erreurs['type']}</j></br>";
            }
        ?>
        <select name='type' id='type'>
            <?php foreach ($types as $type): ?>
                    <option value="<?php echo htmlspecialchars($type['id']);?>">
                        <?php echo htmlspecialchars($type['nom']); ?>
                    </option>
                <?php endforeach; ?>
        </select>

        <?php
            if (!empty($succes['ajout'])) {
                echo "<j class='erreur'>{$succes['ajout']}</j></br>";
            }
        ?>
        <button type='submit'>Enregistrer</button>
    </form>
</div>

<?php

include '../elements/footer.php';
