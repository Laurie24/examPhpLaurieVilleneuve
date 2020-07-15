<html>
<body>
<?php
include 'nav.php';
include 'head.php';

require_once 'pdo_connexion.php';
require_once 'functions.php';
$errors = [];
if ( $_SERVER['REQUEST_METHOD'] === 'POST'){
    $returnValidation = validateForm();
    $errors = $returnValidation['errors'];
    if( count($errors) === 0) {
        addBdd($pdo);
        header('Location: experience.php');
    }
}
?>

<h1>Ajouter une expérience</h1>
<div class="container">
    <form method="post" action="add-experience.php" enctype="multipart/form-data">
        <label>Titre de l'expérience</label>
        <input type="text" name="titre" class="form-control" >
        <label>Date de début</label>
        <input type="date" name="date_debut" class="form-control"  >
        <label>Date de fin</label>
        <input type="date" name="date_fin" class="form-control" >
        <label>Description</label>
        <textarea name="description" class="form-control" ></textarea><br>
        <input class="btn" type="submit">
        <?php
        if(count($errors) != 0){
            echo(' <h2>Erreurs lors de la dernière soumission du formulaire : </h2>');
            foreach ($errors as $error){
                echo('<div class="error">'.$error.'</div>');
            }
        }
        ?>
    </form>
</div>
</body>
</html>