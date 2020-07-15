<html>
<body>
<?php
include 'head.php';
require_once 'functions.php';
require_once 'pdo_connexion.php';
?>
<?php
session_start();
if(isset($_POST['password']) &&!empty($_POST['password']) && !empty($_POST['username'])){
    $_SESSION['username'] = $_POST['username'];
    setcookie('remember_me', $_POST['remember_me'], time()+3600);
    header('Location: index.php');
} else {
    header('Location: login.php');
}
?>
</body>
</html>