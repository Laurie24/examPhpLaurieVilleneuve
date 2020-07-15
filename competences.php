
<html>
<?php
include 'head.php';
include 'nav.php';
require_once 'functions.php';
require_once 'pdo_connexion.php';


$reponse = $pdo->query('SELECT * FROM competence');

?>
<body>

<div>
    <h1 class="title">Compétences</h1>
</div>
<div class="add">
    <a class="btn" title="Ajouter une competence" href="add-competence.php">Ajouter une compétence</a>
</div>


<div  class="liste row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
    <?php
    while ($data = $reponse->fetch()) {
        ?>
    <div class="card shadow">

        <div class="content">
            <h3><?php echo($data['titre']); ?></h3>
            <p><?php
                if ($data['note']==5){
                    echo '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
                }
                if ($data['note']==4){
                    echo '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>';
                }
                if ($data['note']==3){
                    echo '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>';
                }
                if ($data['note']==2){
                    echo '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>';
                }
                if ($data['note']==1){
                    echo '<i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>';
                }
            ?></p>
            <a class="btn" title="Modifier" href="edit-competence.php?id=<?php echo($data['id']); ?>">
                Modifier
            </a><br>
            <a class="btn" title="Supprimer" href="delete-competence.php?id=<?php echo($data['id']); ?>">
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