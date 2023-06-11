<?php
session_start();

include('connectio.php');
include('functions.php');

if(isset( $_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=="POST"){
    //something was posted
    $usefnam=$_POST['nom'];
   
    $usemail=$_POST['email'];
    $userphone=$_POST['telephone'];
   
    $userplat=$_POST['plat'];
    $useradresse = $_POST['adresse'];
  

    
    if (!empty($usefnam)  && !empty($usemail) && !empty($userphone) && !empty($userplat) && !empty($useradresse)) {
        
        

        

        //save to data base
        $query ="insert into collaboration (nom,email,telephone,plat,adresse) values ('$usefnam','$usemail','$userphone','$userplat','$useradresse')";
        
        $result=mysqli_query($con,$query);
        if ($result1 !== 0) {
            header("Location: principale.php?success=Your informations has been send successfully...");
         exit();
       }else {
               header("Location: principale.php?error=unknown error occurred!");
            exit();
       }

        //header("Location: dessert.php");
        //die;
    
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
  <!--lien pour utuliser bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!--lien pour acceder au fichier CSS-->
  <link rel="stylesheet" href="../login/assets/css/menucss.css">
  <!--titre de la page web-->
  <title>MRF</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
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
      <div class="navbar-collapse justify-content-end collapse" id="navbarSupportedContent" >
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
              <li><a class="dropdown-item" href="entree.html">Entrée Marocaine</a></li>
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
              <li><a class="dropdown-item" href="#">Paramètres</a></li>
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

  <!--presentation du site par le heading et un paragraphe-->

  <section class="bg-light text-dark p-5 text-center">
    <div class="container mt-5">
      <div class="d-sm-flex align-items-center justify-content-between">
        <div>
          <h1>Voyage culinaire au Maroc :<br> <span class="text-warning">Recettes authentiques à découvrir</span></h1>
        <p class="lead">Découvrez la cuisine marocaine à travers nos recettes traditionnelles, simples et savoureuses. Tous les secrets de cette gastronomie riche en épices et en couleurs seront à portée de main pour émerveiller vos papilles. Bon appétit !</p>
    </div>
  </section>
  <!--end heading-->

  <!--partie historique des plats marocains-->
  <section class="about" id="about">
    <h1 class="heading">à propos de <span> nous</span> </h1>
    <div class="row">
      <div class="video-container">
        <video src="../login/assets/images/tagine.mp4" loop autoplay muted></video>
        <h3>Les meilleurs recettes marocaines</h3>
      </div>
      <div class="content">
        <h3>Pourquoi nous choisir?</h3>
        <p>Moroccan Food est le choix parfait pour tous les amateurs de cuisine marocaine. Avec plus de 30 chefs de cuisine marocaine de renom, notre site web offre une expérience culinaire unique qui vous permet de découvrir les saveurs authentiques du Maroc. De l'incontournable tajine à la délicieuse pastilla, en passant par les couscous et les pâtisseries traditionnelles, notre site propose une large sélection de recettes pour tous les goûts. </p>
        <p>Avec Moroccan Food, vous pouvez être sûr de trouver l'inspiration pour vos prochains plats marocains et d'impressionner vos invités avec des plats savoureux et authentiques.</p>
        <a href="#" class="btn">Voir plus</a>
      </div>
    </div>

  </section>
  <!--end historique-->
  <section >
    <div class="counter-up">
      <div class="content">
        <div class="box">
          <div class="icon"><i class="fas fa-history"></i></div>
          <div class="counter">724</div>
          <div class="text">Temps passé</div>
        </div>
        <div class="box">
          <div class="icon"><i class="fa-solid fa-utensils"></i></div>
          <div class="counter">54</div>
          <div class="text">Recettes</div>
        </div>
        <div class="box">
          <div class="icon"><i class="fas fa-users"></i></div>
          <div class="counter">136</div>
          <div class="text">Inscrit/Inscrite</div>
        </div>
        <div class="box">
          <div class="icon"><i class="fas fa-award"></i></div>
          <div class="counter">32</div>
          <div class="text">Chef professionnel</div>
        </div>
      </div>
    </div>
  </section>
  
    <!--start chef-->
  <h1 class="heading">Nos célèbres <span> Chefs</span> </h1>
  <div class="container1">
      <div class="card">
        <div class="img">
          <img src="../login/assets/images/chefchoumicha.jpg">
        </div>
        <div class="top-text">
          <div class="name"> CHAFAY Choumicha</div>
          <p>Chef cuisinière</p>
        </div>
        <div class="bottom-text">
          <div class="text">née Choumicha Chafay en 1972 à Ajdir, au Maroc, est une productrice-animatrice marocaine d'émissions culinaires sur la chaîne 2M ainsi que sur sa propre chaîne YouTube, et propriétaire d'un restaurant.</div>
          <div class="btnn">
            <a href="#">Voir Plus</a>
          </div>
        </div>
      </div>
      
      <div class="card">
        <div class="img">
          <img src="../login/assets/images/chefmoha.jpg">
        </div>
        <div class="top-text">
          <div class="name">FEDAL Mohamed</div>
          <p>Chef cuisinier</p>
        </div>
        <div class="bottom-text">
          <div class="text">né le 30 mai 1967 à Marrakech, est un chef cuisinier marocain et dirigeant fondateur de plusieurs restaurants à Marrakech, Madrid et Paris.</div>
          <div class="btnn">
            <a href="#">Voir Plus</a>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="img">
          <img src="../login/assets/images/chefkhadija.jpg">
        </div>
        <div class="top-text">
          <div class="name">BENSDIRA Khadija</div>
          <p>Chef cuisinière</p>
        </div>
        <div class="bottom-text">
          <div class="text">
Khadija Bensdira, est l’ambassadrice de la cuisine traditionnelle marocaine dans le monde entier.</div>
          <div class="btnn">
            <a href="#">Voir plus</a>
          </div>
        </div>
      </div>
      
    </div>
    
 

  <!--pour faire une collaboration avec les restau-->
  <section class="order-form py-5">
    <div class="container">
      <div class="row">
        <h3 class="text-center text-dark mb-4"><span class="text-warning">Collaboration</span></h3>
        <div class="row">
          <div class="col-md-8">
            <p>Bonjour à tous les restaurateurs passionnés de cuisine marocaine ! Nous souhaiterions vous inviter à collaborer avec nous en partageant l'une de vos recettes signature. En échange, nous offrons une exposition à travers notre site de cuisine marocaine en faisant la promotion de votre restaurant et de votre plat. Nous croyons que cette initiative est un excellent moyen de faire découvrir de nouvelles recettes à notre communauté, tout en mettant en avant les talents culinaires de votre établissement. Nous espérons que vous serez enthousiastes à l'idée de collaborer avec nous et nous sommes impatients de découvrir vos délicieuses créations culinaires marocaines !</p>
          </div> 
            <!--add image-->
          <div class="col-md-4">
              <img src="../login/assets/images/restau_collab.png" id="imagee" class="img-fluid d-block mx-auto mb-4" alt="">
            <!--end-->
          </div>
        </div>
        <!--un formulaire pour les restau qui veulent collaborer-->
        <form method="post"> 
          <div class="row">
            <div class="col-md-6 col-sm">
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                <input type="text" class="form-control" name="nom" placeholder="votre nom" >
              </div>
              <!--selectionner-->
              <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-utesils"></i></label>
                <input type="text" class="form-control" name="plat" placeholder="type du plat .." >
              </div>
            </div>
            <!--parti mail-->
              <div class="col-md-6 col-sm">
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
                  <input type="text" class="form-control" name="email" placeholder="Votre email" >
                </div>
                <!--tel-->
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                  <input type="number" class="form-control" name="telephone" placeholder="Numero de téléphone" >
                </div>
                <!--adresse-->
                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-home"></i></span>
                  <input type="text" class="form-control" name="adresse" placeholder="Adresse zone Ex:Oujda 6000" >
                </div>
                <!--fin partie adresse-->
                <!--start button-->
                <button type="submit" id="submit" name="submit" style="
                    border: none;
                    outline: none;
                    width: 100%;
                    height: 45px;
                    background: #ececec;
                    border-radius: 5px;
                    transition: .4s;
                    background: #ffc107;">
                             enregistrer
                        </button>
                        <!--end button-->
              </div>
            <!--fin partie mail-->
          </div>
        </form>
      </div>
    </div>
  </section>


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