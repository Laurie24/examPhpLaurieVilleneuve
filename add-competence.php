<html>
<body>
<?php
include 'nav.php';
include 'head.php';

require_once 'pdo_connexion.php';
require_once 'functions.php';

$errors = [];
if ( $_SERVER['REQUEST_METHOD'] === 'POST'){
    $returnValidationC = validateFormCompetence();
    $errors = $returnValidationC['errors'];
    if(count($errors) === 0) {
        addBddC($pdo);
        header('Location: competences.php');
    }
}
?>

<h1>Ajouter une compétence</h1>
<div class="container">
    <form method="post" action="add-competence.php" enctype="multipart/form-data">
        <label>Titre</label>
        <input type="text" name="titre" class="form-control" >
        <label>Note</label>
        <select name="note" class="form-control" >
            <?php
            foreach (getEtoile() as $note) {
                echo('<option value="'.$note.'">'.$note.'</option>');
            }
            ?>
        </select>
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