<?php

$connexion = new PDO('mysql:host=localhost;dbname=weborne','root','');

if(isset($_POST['registration']))
{       
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $password = sha1($_POST['password']);
    $password2 = sha1($_POST['password2']);


    if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['password']) AND !empty($_POST['password2']))
    {
        $pseudolength = strlen($pseudo);
        if($pseudolength <= 255)
        {
            if($password == $password2)
            {
                $insertusers = $connexion->prepare("INSERT INTO users (pseudo, mail, motdepasse) VALUES (?,?,?)");
                $insertusers->execute(array($pseudo, $mail, $password));
                
            }
            else
            {
                $erreur = "Mot de passe différent. Recommencez.";
            }
        }
        else
        {
            $erreur = "Votre pseudo ne doit pas dépasser 255 caractères.";
        }
    }
    else
    {
        $erreur = "Tous les champs doivent être complétés.";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

<div class="container register-form">

    <div class="form mt-5">
        <h1>Inscription</h1>
    </div>

    <form method="POST" action="">

        <div class="form-content mt-5">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Pseudo *" id="pseudo" name="pseudo" />
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email *" id="mail" name="mail" />
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password *" id="password" name="password"/>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Confirm Password *" id="password2" name="password2"/>
                </div>
                
            </div>
        </div>

        <input type="submit" name="registration" value="Enregistrer" class="btn btn-dark">

    </form>
    <br>
    <br>
    <?php
        if(isset($erreur))
        {
            echo $erreur;
        }
    ?>

</div>


</body>
</html>