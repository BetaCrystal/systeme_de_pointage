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
    <form action='' method="POST" class='ticket-form'>
        <?php
            if (!empty($erreurs['horaires'])) {
                echo "<p class='error'>{$erreurs['horaires']}</p></br>";
            }
        ?>
        <div class='row' style='padding: 0 0 5vh;'>
            <label for='heure_debut'>Heure de début :
                <input type='time' name='heure_debut' id='heure_debut'/>
            </label>

            <label for='heure_fin'>Heure de fin :
                <input type='time' name='heure_fin' id='heure_fin'/>
            </label>
        </div>

        <label for='type' style='padding-bottom: 7vh;'>Arrivée/Départ :*
            <?php
                if (!empty($erreurs['type'])) {
                    echo "<p class='error'>{$erreurs['type']}</p></br>";
                }
            ?>
            <select name='type' id='type'>
                <?php foreach ($types as $type): ?>
                        <option value="<?php echo htmlspecialchars($type['id']);?>">
                            <?php echo htmlspecialchars($type['nom']); ?>
                        </option>
                    <?php endforeach; ?>
            </select>
        </label>

        <?php
            if (!empty($succes['ajout'])) {
                echo "<p class='error'>{$succes['ajout']}</p></br>";
            }
        ?>
        <button type='submit'>Enregistrer</button>
    </form>
</div>

<?php

include '../elements/footer.php';
