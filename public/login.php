<?php

include '../includes/connection.php';
include '../elements/header.php';

?>

<h2>Connexion</h2>
<form action='' method="POST" id="loginForm" class='login-form'>
    <div class='row' style='padding: 0 0 15vh;'>
        <label for='nom_utilisateur'>Votre identifiant :*
        <?php
                if (!empty($erreurs['nom_utilisateur'])) {
                    echo "<j class='erreur'>{$erreurs['nom_utilisateur']}</j></br>";
                }
        ?>
        <input type='text' name='nom_utilisateur' id='nom_utilisateur'/>
        </label>

        <label for='mot_de_passe'>Votre mot de passe :*
        <?php
                if (!empty($erreurs['mot_de_passe'])) {
                    echo "<j class='erreur'>{$erreurs['mot_de_passe']}</j></br>";
                }
        ?>
        <input type='password' name='mot_de_passe' id='mot_de_passe'/>
        </label>
    </div>
    <?php
            if (!empty($erreurs['code_pin'])) {
                echo "<j class='erreur'>{$erreurs['code_pin']}</j></br>";
            }
    ?>

    <input type='text' value='' id='code_pin' name='code_pin' hidden>

    <button type='submit' id='login'>Se connecter</button>
</form>

<script>
    //Script fourni par copilot pour vérifier le code PIN après l'envoi du mot de passe et de l'identifiant
const form = document.getElementById('loginForm');
const codePinInput = document.getElementById('code_pin');
const nomUtilisateurInput = document.getElementById('nom_utilisateur');
const motDePasseInput = document.getElementById('mot_de_passe');

form.addEventListener('submit', async (e) => {
    e.preventDefault();

    // If PIN is already provided, submit the form normally
    if (codePinInput.value !== '') {
        form.submit();
        return;
    }

    // First, validate username and password via AJAX
    const formData = new FormData();
    formData.append('nom_utilisateur', nomUtilisateurInput.value);
    formData.append('mot_de_passe', motDePasseInput.value);
    formData.append('validate_credentials', 'true');

    try {
        const response = await fetch('', {
            method: 'POST',
            body: formData
        });

        const result = await response.json();

        if (result.valid) {
            // Credentials are valid, now ask for PIN
            const pin = prompt('Saisissez votre code PIN personnel');
            if (pin !== null && pin !== '') {
                codePinInput.value = pin;
                form.submit();
            }
        } else {
            // Show error message
            alert(result.message || 'Identifiant ou mot de passe invalide');
        }
    } catch (error) {
        console.error('Erreur:', error);
        alert('Une erreur est survenue');
    }
});
</script>

<?php

include '../elements/footer.php';
