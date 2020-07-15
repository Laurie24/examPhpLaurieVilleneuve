<html>
<body>
<?php
include 'head.php';

session_start();

require_once 'functions.php';
require_once 'pdo_connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = login($pdo, $_POST['login'], $_POST['password']);

    if (count($errors) == 0) {
        header('Location: home.php');
    }
}
?>

<div class="container py-5 d-flex justify-content-center">
    <div class="card shadow mb-5 pb-4 bg-white" style="width: 22rem; border-radius: 1.5rem; border: none;">
        <div class="card-body text-center">
            <h2>Connectez-vous</h2>
            <form method="post">
                <div class="form-group">
                    <label>Email : </label><br>
                    <input type="text" name="login" placeholder="Email">
                </div>
                <div class="form-group">
                    <label>Mot de passe : </label><br>
                    <input type="password" name="password" placeholder="Mot de passe">
                </div>

                <input type="submit">
            </form>
        </div>
    </div>
</div>


<?php
if(isset($errors)){
    if(count($errors)>0){
        echo('<h2>Les erreurs : </h2>');
        foreach ($errors as $error){
            echo('<li>'.$error.'</li>');
        }
    }
}

?>
</body>

</html>