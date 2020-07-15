<html>
<body>
<?php
include 'head.php';
require_once 'functions.php';
require_once 'pdo_connexion.php';
?>
<?php
session_start();
session_destroy();
header('Location: login.php')
?>
</body>
</html>