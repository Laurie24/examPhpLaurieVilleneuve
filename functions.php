<?php
function isUserConnecter(){
    if($_SESSION['user']){
        return $_SESSION['user'];
    } else {
        header('Location: login.php');
    }
}

function login($pdo, $login, $password) {
    $errors = [];

    try{
        $req = $pdo->prepare(
            'SELECT * FROM user where email = :email and mot_de_passe = :mot_de_passe');
        $req->execute([
            'email' => $login,
            'mot_de_passe' => md5($password)
        ]);
    } catch (PDOException $exception){
        var_dump($exception);
        die();
    }

    $res = $req->fetch();
    if($res == false){
        $errors[] = 'Utilisateur inconnu';
        session_destroy();
    } else {
        $_SESSION['user'] = $res;
    }
    return $errors;
}

function getExperience($pdo, $id)
{
    $res = $pdo->prepare('SELECT * FROM experience WHERE id = :id');
    $res->execute(['id' => $id]);
    return $res->fetch();
}

function getCompetence($pdo, $id)
{
    $res = $pdo->prepare('SELECT * FROM competence WHERE id = :id');
    $res->execute(['id' => $id]);
    return $res->fetch();
}

function addBdd($pdo)
{
    $req = $pdo->prepare(
        'INSERT INTO experience(titre, description, date_debut, date_fin)
VALUES(:titre, :description, :date_debut, :date_fin)');
    $req->execute([
        'titre' => $_POST['titre'],
        'description' => $_POST['description'],
        'date_debut' => $_POST['date_debut'],
        'date_fin' => $_POST['date_fin'],
    ]);
}

function addBddC($pdo){
    $req = $pdo->prepare(
        'INSERT INTO competence (titre, note)
VALUES(:titre, :note)');
    $req->execute([
        'titre' => $_POST['titre'],
        'note' => $_POST['note'],
    ]);
}


function validateForm()
{
    $errors = [];

    if (empty($_POST['titre'])) {
        $errors[] = 'Veuillez saisir un titre';
    }
    if (empty($_POST['description'])) {
        $errors[] = 'Veuillez saisir une description';
    }
    if (empty($_POST['date_debut'])) {
        $errors[] = 'Veuillez saisir une date de début de mission';
    }
    if (empty($_POST['date_fin'])) {
        $errors[] = 'Veuillez saisir une date de fin de mission';
    }

    return ['errors' => $errors];
}

function validateFormCompetence()
{
    $errors = [];

    if (empty($_POST['titre'])) {
        $errors[] = 'Veuillez saisir un titre';
    }
    if (empty($_POST['note'])) {
        $errors[] = 'Veuillez saisir une note';
    }

    return ['errors' => $errors];
}

function deleteExperience($pdo, $id)
{
    $res = $pdo->prepare('DELETE FROM experience WHERE id = :id');
    $res->execute(['id'=> $id]);
}

function deleteCompetence($pdo, $id)
{
    $res = $pdo->prepare('DELETE FROM competence WHERE id = :id');
    $res->execute(['id'=> $id]);
}

function validateEditForm()
{
    $errors = [];

    if (empty($_POST['titre'])) {
        $errors[] = 'Veuillez saisir un titre';
    }
    if (empty($_POST['description'])) {
        $errors[] = 'Veuillez saisir une description';
    }
    if (empty($_POST['date_debut'])) {
        $errors[] = 'Veuillez saisir une date de début de mission';
    }
    if (empty($_POST['date_fin'])) {
        $errors[] = 'Veuillez saisir une date de fin de mission';
    }

    return ['errors' => $errors];
}

function validateEditFormCompetence()
{
    $errors = [];
    if (empty($_POST['titre'])) {
        $errors[] = 'Veuillez saisir un titre';
    }
    if (empty($_POST['note'])) {
        $errors[] = 'Veuillez saisir une note';
    }

    return ['errors' => $errors];
}


function updateBdd($pdo, $id)
{
        $req = $pdo->prepare('UPDATE experience SET titre = :titre, description = :description , date_debut = :date_debut ,
date_fin = :date_fin  WHERE id = :id');
        $req->execute([
            'titre' => $_POST['titre'],
            'description' => $_POST['description'],
            'date_debut' => $_POST['date_debut'],
            'date_fin' => $_POST['date_fin'],
            'id' => $id
        ]);

}

function updateBddC($pdo, $id)
{
    $req = $pdo->prepare('UPDATE competence SET titre = :titre, note = :note WHERE id = :id');
    $req->execute([
        'titre' => $_POST['titre'],
        'note' => $_POST['note'],
        'id' => $id
    ]);

}


function getEtoile()
{
    $note = [
        '1',
        '2',
        '3',
        '4',
        '5'
    ];
    return $note;
}