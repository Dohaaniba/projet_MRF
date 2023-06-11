<?php
session_start();

include('connectio.php');

if($_SERVER['REQUEST_METHOD']=='POST'){
    //something was posted
    $usefnam=$_POST['nom'];
    $usenam=$_POST['prenom'];
    $usemail=$_POST['email'];
    $userphone=$_POST['telephone'];
    $password=$_POST['password'];
    
    if ($password == $_POST["repeatPassword"] && is_numeric($userphone)) {
        
        // hashing the password
        $password = md5($password);

        

        //save to data base
        $query ="insert into users (nom,prenom,password,email,telephone) values ('$usefnam','$usenam','$password','$usemail','$userphone')";
        
        $result=mysqli_query($con,$query); 
        if ($result) {
            header("Location: login.php");  
       }else {
               header("Location: signup.php?error=unknown");
       }

    
    }
    else {
        echo "s'il vous plait entrer des informations valide !";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"rel="stylesheet">

     <!--lien pour utuliser bootstrap-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
     <!--lien pour acceder au fichier CSS-->
     <link rel="stylesheet" href="../login/assets/css/sign_up.css">
    <title>MRF</title>
</head>
<body>
    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image">
                </div>
                <div class="col-md-6 right">
                    <form  method="post">
                        <header>
                            <div class="row-md-1" >
                                <div class="col-md-8" >
                                    <img src="../login/assets/images/logojdid.png.png" alt="LOGO " width="60" height="45" >
                                </div>
                                <div class="col-md-8">
                                    <h2 class="text-dark fw-bolder text-center fs-4 mb-2">Morrocan F<span class="text-warning">oo</span>d</h2>
                                </div>
                            </div>
                        </header>
                        <!--start name-->
                        <div class="input-field">
                            <input type="text" class="input" name="nom" id="name" required>
                            <label for="nom">Nom</label>
                        </div>
                        <!--end name-->
                        <!--start prenom-->
                        <div class="input-field">
                            <input type="text" class="input" name="prenom" id="prenom" required>
                            <label for="prenom">Prenom</label>
                        </div>
                        <!--end prenom-->
                        <!--email-->
                        <div class="input-field">
                            <input type="text" class="input" name="email" id="email" required autocomplete="off">
                            <label for="email">Email</label>
                        </div>
                        <!--end email-->
                        <!--numero de telephone-->
                        <div class="input-field">
                            <input type="text" class="input" name="telephone" id="telephone" required autocomplete="off">
                            <label for="telephone">Numéro de téléphone</label>
                        </div>
                        <!--end numero de telephone-->
                        <!--start password-->
                        <div class="input-field">
                            <input type="password" name="password" class="input" id="password" required>
                            <label for="password">Mot de passe</label>
                        </div>
                        <!--end password-->
                        <!--start passwordrepeat-->
                        <div class="input-field">
                            <input type="password" name="repeatPassword" class="input" id="passwor" required>
                            <label for="password">Répéter le mot de passe</label>
                        </div>
                        <!--end passwordrepeat-->

                        <!--start button-->
                        <button type="submit" id="submit" name="submit">
                             sign up
                        </button>
                        <!--end button-->
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>