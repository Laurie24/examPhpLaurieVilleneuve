<html>
<body>
<?php
include 'head.php';
include "nav.php";
session_start();
require_once 'functions.php';
require_once 'pdo_connexion.php';
$user = isUserConnecter();
?>
<div class="fond">
    <h1 class="welcome">Bienvenue <?php echo($user['prenom']);?> <br> sur le CV de Laurie Villeneuve</h1>
    <div class="add">
        <a class="btn" href="disconnect.php">Se déconnecter</a>
    </div>
</div>


</body>
</html>