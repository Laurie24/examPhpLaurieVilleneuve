<?php
require_once 'pdo_connexion.php';
require_once 'functions.php';
$id = $_GET['id'];
deleteExperience($pdo, $id);
header('Location: experience.php');
?>