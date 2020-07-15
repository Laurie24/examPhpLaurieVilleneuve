<html>
<body>
<?php
include 'nav.php';
include 'head.php';

require_once 'pdo_connexion.php';
require_once 'functions.php';
$errors = [];
$idCompetence = $_GET['id'];
$competence = getCompetence($pdo, $idCompetence);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $returnValidation = validateEditFormCompetence();
    $errors = $returnValidation['errors'];
    updateBddC($pdo, $competence['id']);
    header('Location: competences.php');
}
?>

<h1>Editer une expérience</h1>
<div class="container">
    <form method="post" action="edit-competence.php?id=<?php echo($competence['id']);?>" enctype="multipart/form-data">
        <label>Titre de la compétence</label>
        <input type="text" value="<?php echo($competence['titre']) ?>" name="titre" class="form-control" >
        <label>Note</label>
        <select name="note" value="<?php echo($competence['note']) ?>" class="form-control" >
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