<?php
session_start();

require_once 'function.php';

if(isset($_POST) && !empty($_POST)){
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); // nettoyage du mail saisie
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ 
        $password = $_POST['password'];
        addusers($email, $password); 
        header('location:index.php?message=Vous êtes inscrit&status=success');

    } else{
        echo "Cette adresse n'est pas valide";
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Security Demo</title>
</head>
<body>
    <main class="container">
        <h1 class="text-center">Inscription utilisateur</h1>
       <a href="index.php" class="btn btn-primary">Connexion</a>
        <form action="" method="post">
            <div>
                <label for="email">Veuillez entrer votre email</label>
                <input type="email" name="email" id="email" class="form-control border-black" required>
            </div>
            <div>
                <label for="password">Veuillez entrer votre mot de passe</label>
                <input type="password" name="password" id="password" class="form-control border-black" required>
            </div>
            <input class="mt-3" type="submit" value="s'inscrire">
        </form>
    </main>
    
</body>
</html>