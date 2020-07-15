<html>
<body>
<?php
include 'nav.php';
include 'head.php';

require_once 'pdo_connexion.php';
require_once 'functions.php';
$errors = [];
$idExperience = $_GET['id'];
$experience = getExperience($pdo, $idExperience);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $returnValidation = validateEditForm();
    $errors = $returnValidation['errors'];
    updateBdd($pdo, $experience['id']);
    header('Location: experience.php');
}
?>

<h1>Editer une expérience</h1>
<div class="container">
    <form method="post" action="edit-experience.php?id=<?php echo($experience['id']);?>" enctype="multipart/form-data">
        <label>Titre de l'expérience</label>
        <input type="text" value="<?php echo($experience['titre']) ?>" name="titre" class="form-control" >
        <label>Date de début</label>
        <input type="date" value="<?php echo($experience['date_debut']) ?>" name="date_debut" class="form-control"  >
        <label>Date de fin</label>
        <input type="date" value="<?php echo($experience['date_fin']) ?>" name="date_fin" class="form-control" >
        <label>Description</label>
        <input type="text" name="description" value="<?php echo($experience['description'])?>" class="form-control" ><br>
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