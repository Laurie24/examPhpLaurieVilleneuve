<html>
<body>
<?php
include 'head.php';
require_once 'functions.php';
require_once 'pdo_connexion.php';
?>
<?php
session_start();
if($_SESSION['user']) {
    header('Location: home.php');
} else {
    header('Location: login.php');
}
?>
</body>
</html>