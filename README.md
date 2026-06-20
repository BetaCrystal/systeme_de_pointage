# systeme_de_pointage

Cette application est un POC destiné à l'entreprise MozartsDuWeb.
Elle a été réalisée en HTML/CSS/JavaScript/PHP à partir d'un cahier des charges.

-----------------------------------------------------------------------------
PREREQUIS :
- PHP 8.2 ou supérieur
- Xampp (ou Wampp)
- Un navigateur web

INSTALLATION DU PROJET :
Depuis le repo GitHub, assurez-vous d'être sur la branche main. Déroulez la flèche à côté de "Code" et téléchargez le ZIP.
Extrayez le ZIP dans C:\xampp\htdocs.

Ouvrez Xampp et lancez Apache et MySQL. Cliquez sur Admin sur la ligne MySQL pour accéder à PhpMyAdmin.
Sélectionnez "Importer" et importez le fichier "pointage.sql" pour importer la base de données du projet.

UTILISATION DE L'APPLICATION :
Dans votre navigateur, ouvrez un nouvel onglet, et entrez l'adresse URL http://localhost/systeme_de_pointage/public/login.php pour accéder à la page de connexion.
Tous les identifiants de connexion et mots de passe sont visibles en clair dans la table "utilisateur" (les mots de passe ne sont pas hachés pour simplifier l'utilisation des informations de login).
Il y a 20 comptes de salariés et 1 compte administrateur.
Chaque compte a un code PIN associé stocké dans la table "pin".

Pour vous connecter, il suffit simplement de renseigner les informations d'un utilisateur dans les champs requis. Une erreur s'affiche si les champs ne sont pas remplis correctement.
Un pop-up s'affiche ensuite dans lequel vous devez renseigner le code PIN.

Une fois la connexion établie, vous serez redirigé soit vers l'ajout de billets, soit vers la page d'administrateur en fonction du compte choisi.

La page d'ajout de billets n'est accessible qu'aux salariés. Elle permet d'ajouter un billet avec une heure de début et de fin, et un type en fonction de s'il s'agit d'un billet d'arrivée ou de départ.
Le type du billet est obligatoire, tandis que seule l'une des deux horaires est requise pour l'ajout d'un billet.
Une fois le billet créé, il ets stocké en base de données et l'utilisateur reste sur la page du formulaire.

La page d'administrateur affiche la liste des billets du plus récent au plus ancien, en affichant le nom du salarié, le type du billet, l'heure de début et l'heure de fin.

Toutes les pages sont responsives et peuvent être utilisées en format PC, tablette et téléphone.

------------------------------------------------------------------------------
POURQUOI AVOIR CHOISI LE CODE PIN ?
Car il y a de très fortes chances que le salarié utilise l'application de pointage sur son téléphone. Il est donc plus simple de mémoriser un code simple à 4 chiffres qu'il n'est pas nécessaire de noter, et qui est donc plus compliqué à deviner (si le code n'est pas 0000 ou 1234 bien sûr). C'est aussi un moyen très rapide de s'authentifier, et contrairement à un badge ou autre objet permettant de se connecter, il ne s'agit pas d'un objet physique pouvant être volé, et il peut être changé rapidement par l'administration en cas de problème.

------------------------------------------------------------------------------
CE QUE J'AURAIS PU AMELIORER AVEC PLUS DE TEMPS :
- J'aurais pu faire le mécanisme du code PIN sans m'aider de l'IA
- J'aurais pu choisir une méthode d'authentification plus complexe pour pouvoir mieux l'étudier

------------------------------------------------------------------------------
POURQUOI LE WEB M'INTERESSE :
Car c'est un outil que j'utilise tous les jours. Mieux le comprendre et mieux comprendre ses dangers me permet d'être plus vigilante sur mes projets et me poser des questions de sécurité de mon code. J'aime plus particulièrement l'aspect design, UX/UI.
Cette alternance pourrait tout d'abord mieux m'intégrer dans le monde professionnel, mais aussi me permettre d'apprendre d'autres développeurs expérimentés et découvrir de nouvelles méthodes de travail. L'alternance m'apporterait aussi des connaissances utiles à ma formation et que je pourrais aussi utiliser dans de futurs projets.
