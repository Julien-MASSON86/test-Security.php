<?php

function dbconnect(){
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=security_demo', 'root', '');
        return $pdo;
        }catch(PDOException $e){
            echo 'ca marche pas';
        } 
}



function login($email, $password){
    $dbh = dbconnect();
    $stmt = $dbh->prepare("SELECT * FROM users WHERE users.email=:toto"); // au lieu d'exécuter la requête directement avec query(), on va la préparer avec prepare()
    $stmt->bindParam(':toto', $email); // on définit a quelle variable va être affecté le marqueur :toto qu'on a utiliser dans la préparation de la requête
    $stmt->execute(); // on exécute la requête pour de vrai 
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $hash = $user['password'];

    if(password_verify($password, $hash)){

        //comparaison du pass saisi avec celui de la bdd
            echo 'utilisateur connecté';
        }else{
            echo 'mauvais identifiants';
        }
    
}


function addusers($email, $password){
    $passwordHash = password_hash($password,PASSWORD_ARGON2I);
    $dbh = dbConnect();
    $stmt = $dbh->prepare("INSERT INTO users VALUES(null, :toto , :tata)");
    $stmt->bindParam(':toto', $email);
    $stmt->bindParam(':tata', $passwordHash);
    $stmt->execute();   
}