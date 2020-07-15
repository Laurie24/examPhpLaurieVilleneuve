<?php
require_once 'pdo_connexion.php';
require_once 'functions.php';
$id = $_GET['id'];
deleteCompetence($pdo, $id);
header('Location: competences.php');
?>