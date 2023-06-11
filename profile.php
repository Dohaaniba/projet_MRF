<?php

session_start();

include('connectio.php');
include('functions.php');

$user_id = $_SESSION['user_id'];

$user_data = get_user_by_id($con,$user_id);

if($_SERVER['REQUEST_METHOD']=='POST'){
    //something was posted
    $usefnam=$_POST['nom'];
    $usenam=$_POST['prenom'];
    $usemail=$_POST['email'];
    $userphone=$_POST['telephone'];
    $password=$_POST['password'];

    
    if ( is_numeric($userphone)) {

        $userX = get_user_by_email($con,$usemail);
        if( $userX == NULL ||  $userX['id'] == $user_data['id']){

            $password = md5($password);

            //save to data base
            $query ="update users set nom = '$usefnam', prenom = '$usenam',password = '$password', email = '$usemail', telephone = '$userphone'  where id = '$user_id' ";
            $result=mysqli_query($con,$query); 
            if ($result) {
                header("Location: index.php");  
        }else {
                echo "erreur de base de données";
        }

        }else{
            echo "yes existe deja ";
        }
        

        


    
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--lien pour utuliser bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!--lien pour acceder au fichier CSS-->
  <link rel="stylesheet" href="../login/assets/css/profilecss.css">
  <!--titre de la page web-->
  <title>MRF</title>
</head>
<body>
  <!--navclass-->
  
  <nav class="navbar navbar-default navbar-expand-lg bg-body-tertiary py-6 fixed-top">
    
    <div class="container">
      <!--logo-->
      <a class="navbar-brand"  href="principale.php">
        <img src="../login/assets/images/logojdid.png.png" alt="LOGO " width="45" height="39" >
        Morrocan F<span id="logo_span">oo</span>d
      </a>
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse justify-content-end collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-5 mb-2 mb-lg-0">
          <!--home-->
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="principale.php">Acceuille</a>
          </li>
          <!--plat-->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle px-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Plat
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="entree.html">Entrée marocaine</a></li>
              <li><a class="dropdown-item" href="dessert.html">Dessert</a></li>
              <li><a class="dropdown-item" href="Plat Traditionnel.html">Plats traditionnels</a></li>
            </ul>
          </li>
          <!--espace-->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle px-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Espace Utilisateur
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="projet.php">Vos recettes</a></li>
              <li><a class="dropdown-item" href="commentaire.php">Vos commentaires</a></li>
             
            </ul>
        </li>
      </ul>
        <!--recherche-->
        <form class="d-flex">
          <input class="form-control mr-2" id="search" type="search" placeholder="Search" aria-label="Search">
          <i class="bi bi-search"></i>
          <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="../login/assets/images/userr.jfif" alt="" width="32" height="32" class="rounded-circle me-2">
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" >
              <li><a class="dropdown-item" href="profile.php">votre Profile</a></li>
              <li><a class="dropdown-item" href="profile.php">Paramètres</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="logout.php">Se déconnecter</a></li>
            </ul>
          </div>
        </div> 
        </form>
      </div>

    </div>
  </nav>
  <!--end nav class-->
  <!--paramettre-->
  <section class="order-form py-5">
    <div class="container">
      <div class="row">
        <h3 class="text-center text-dark mb-4 mt-5"><span class="text-white">Bienvenue Dans Votre Profile</span></h3>
        <div class="row">
                  
                
                    <!--parti image-->
                    <div class="col-md-6 col-sm"> 
                       <!--parti nom-->
                    <form  method="post">
                      <div class="input-group mb-3"></div>
                       <div class=""style=" width: 30vw;" >
                        <img src="../login/assets/images/chef.png" alt="" width="80" height="80" class="rounded-circle me-2">
                       </div>
                      <div class="input-group mb-3 mt-2">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" name="nom" id="name" value="<?php echo $user_data['nom']; ?>" required>
                            
                        </div>
                        
                    <!--partie mail-->
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
                      <input type="text" class="form-control" name="email" id="email" value="<?php echo $user_data['email']; ?>" required autocomplete="off">
                    </div>
                    <!--nv mt de ps-->
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                      <input type="password" name="password" class="form-control" id="password" placeholder="entrer nouveau password" required>
                    </div>
                      <!--tel-->
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                        <input type="text" class="form-control" name="telephone" id="telephone" value="<?php echo $user_data['telephone']; ?>" required autocomplete="off">
                      </div>
                      
                      <div class="col-md-6">
                      <button class="btn btn-secondary" type="submit" id="submit" name="submit">
                      Enregistrer
                        </button>
                        
                     </div>
                    </form>
                    
                 </div>
            <!--add image-->
          <div class="col-md-6 my-auto">
              <img src="../login/assets/images/img_sign_up2-removebg-preview.png" class="img-fluid d-block mx-auto mb-4" alt="">
          </div>
         
        </div>
    </section>
        <!--un formulaire pour les restau qui veulent collaborer-->
<!--footer-->
<footer>
            <footer class="footer-distributed">

                <div class="footer-left">
                    <h3>Morrocan F<span>oo</span>d</h3>
        
                    <p class="footer-links">
                        <a href="#">Menu</a>
                        |
                        <a href="#">A propos</a>
                        |
                        <a href="#">Recettes</a>
                        |
                        <a href="#">Blog</a>
                    </p>
        
                    <p class="footer-company-name">Copyright © 2023 <strong>Morrocan Food</strong> All rights reserved</p>
                </div>
        
                <div class="footer-center">
                    <div>
                        <i class="fa fa-map-marker"></i>
                        <p><span>Casablanca Anfa 20000 </span>
                            Route Jorf Al asfar</p>
                    </div>
        
                    <div>
                        <i class="fa fa-phone"></i>
                        <p>FIX: 0535458890</p>
                    </div>
                    <div>
                        <i class="fa fa-envelope"></i>
                        <p><a href="anibadoha9@gmail.com">EMR2023@gmail.com</a></p>
                    </div>
                </div>
                <div class="footer-right">
                    <p class="footer-company-about">
                        <span>A propos du site</span>
                        <strong>Morrocan Food</strong> propose une expérience culinaire unique pour tous 
                        les amateurs de cuisine marocaine.
                    </p>
                    <div class="footer-icons">
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-tiktok"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>
    </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function(){
      $('.counter').counterUp({
        delay: 10,
        time: 1200
      });
    });
    </script>
</body>
</html>