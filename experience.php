

<html>
<?php
include 'head.php';
include 'nav.php';
require_once 'functions.php';
require_once 'pdo_connexion.php';


$reponse = $pdo->query('SELECT * FROM experience');

?>
<body>

<div>
    <h1 class="title">Expériences</h1>
</div>
<div class="add">
    <a class="btn" title="Ajouter une expérience" href="add-experience.php">Ajouter une expérience</a>
</div>


<div  class="liste row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
    <?php
    while ($data = $reponse->fetch()) {
        ?>
    <div class="card shadow">

        <div class="content">
            <h3><?php echo($data['titre']); ?></h3>
            <h4><?php echo($data['date_debut']); ?> / <?php echo($data['date_fin']); ?></h4>
            <p><?php echo($data['description']); ?></p>
            <a class="btn" title="Modifier" href="edit-experience.php?id=<?php echo($data['id']); ?>">
                Modifier
            </a><br>
            <a class="btn" title="Supprimer" href="delete-experience.php?id=<?php echo($data['id']); ?>">
                Supprimer
            </a><br>
    </div>

</div>
    <?php
    }
    $reponse->closeCursor();
    ?>
</body>
</html>