<?php
session_start();
include('connectio.php');
include('functions.php');

$user_id = $_SESSION['user_id'];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  //something was posted
  $exist_deja = get_comment_by_id_user($con, $user_id) == NULL;

  if ($exist_deja) {
    $comment = $_POST['commentaire'];
    $query = "insert into commentaires (id_user,txt) values ('$user_id','$comment')";

    $result = mysqli_query($con, $query);
    if ($result) {
      echo "commentaire ajouté avec succes";
    } else {
      echo "probleme sur la base de données";
    }
  } else {
    header("Location: principale.php");
    echo 'vous avez deja mettre un commentaire.';
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
  <link rel="stylesheet" href="../login/assets/css/commentaire.css">
  <!--titre de la page web-->
  <title>MRF</title>
</head>

<body>
  <!--navclass-->

  <nav class="navbar navbar-default navbar-expand-lg bg-body-tertiary py-6 fixed-top">

    <div class="container">
      <!--logo-->
      <a class="navbar-brand" href="principale.php">
        <img src="../login/assets/images/logojdid.png.png" alt="LOGO " width="45" height="39">
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
              <li><a class="dropdown-item" href="entree.html">Entrée Marocaine</a></li>
              <li><a class="dropdown-item" href="dessert.html">Dessert</a></li>
              <li><a class="dropdown-item" href="Plat Traditionnel.html">Plat traditionnel</a></li>
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
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
              <li><a class="dropdown-item" href="profile.php">votre Profile</a></li>
              <li><a class="dropdown-item" href="profile.php">Paramètres</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
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
  <div class="commentaire">
    <section class="order-form py-5 ">
      <div class="container ">
        <div class="row">
          <h3 class="text-center text-dark mb-4 mt-5"><span class="text-white">Espace Commentaires</span></h3>
          <div class="row">



            

              <?php
              echo "<div id=\"myCarousel\" class=\"carousel slide bg-white\" data-bs-ride=\"carousel\">";
              $x = 0;
              $sql = "select u.nom,u.prenom,c.txt from users as u,commentaires as c Where u.id = c.id_user limit 9";
              $result = mysqli_query($con, $sql);
              echo "<div class=\"carousel-indicators bg-warning \">";
              if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                  if ($x % 3 == 0) {
                    $f = $x / 3;
                    if ($x == 0) {
                      $active = "active";
                    } else {
                      $active = "";
                    }
                    echo "<button type=\"button\" data-bs-target=\"#myCarousel\" data-bs-slide-to=\"" . $f . "\" class=\"" . $active . "\"  aria-label=\"Slide " . $x . "\"></button>";
                  }
                  $x = $x + 1;
                }
              }
              echo "</div>";

              $x = 0;
              $sql1 = "select u.nom,u.prenom,c.txt from users as u,commentaires as c Where u.id = c.id_user limit 9";
              $result1 = mysqli_query($con, $sql1);
              $x = 0;

              echo "<div class=\"carousel-inner\" >";

              echo "<div class=\"carousel-item  active  \">";
              echo "<div class=\"container d-flex  align-items-center text-center\">";

              if (mysqli_num_rows($result1) > 0) {
                // output data of each row
                while ($row1 = mysqli_fetch_assoc($result1)) {
                  if ($x % 3 == 0 && $x != 0) {
                    echo "</div>";
                    echo "</div>";
                    echo "<div class=\"carousel-item   \" >";
                    echo "<div class=\"container d-flex  align-items-center text-center\">";
                  }

                  
                  echo "<div class=\" my-5 \"style=\" width: 30vw;\">";
                  echo "<img src=\"../login/assets/images/userr.jfif\" alt=\"\" width=\"70\" height=\"70\" class=\"rounded-circle me-2\">";
                  echo "<h4 class=\"fw-normal\">" . $row1['nom'] . " " . $row1['prenom'] . "</h4>";
                  echo "<p>" . $row1['txt'] . "</p>";
                  echo "</div>";


                  $x = $x + 1;
                }
              }
              echo "</div>";
              echo "</div>";
              echo "</div>";


              echo "<button class=\"carousel-control-prev\" type=\"button\" data-bs-target=\"#myCarousel\" data-bs-slide=\"prev\">";
              echo "<span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>";
              echo "<span class=\"visually-hidden\">Previous</span>";
              echo "</button>";
              echo "<button class=\"carousel-control-next\" type=\"button\" data-bs-target=\"#myCarousel\" data-bs-slide=\"next\">";
              echo "<span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>";
              echo "<span class=\"visually-hidden\">Next</span>";
              echo "</button>";
              echo "</div>";

              ?>
              <div class="col-md-6 col-sm mt-5">

                <div class="input-group mb-3 mt-5">
                  <p>"Notre site web comprend un espace de commentaire et de témoignage <br> pour permettre à nos
                    utilisateurs de partager leur expérience et leur avis <br> sur notre site .Nous sommes fiers de
                    fournir un espace ouvert et <br> transparent pour encourager les commentaires honnêtes et
                    constructifs.<br>
                    Nous apprécions toutes les formes de commentaires et de témoignages.<br>Nous sommes impatients de
                    lire vos commentaires et témoignages et <br> nous vous remercions d'avance pour votre contribution
                    à notre site web."
                  </p>
                  <h5 class="text-center text-dark "><span class="text-white">vous avez le droit d'ajouter un seul commentaire</span></h5>
                </div>
                <div class="input-group mb-3"></div>
                <div class="" style=" width: 30vw;">
                  <img src="../login/assets/images/userr.jfif" alt="" width="70" height="70" class="rounded-circle me-2">
                </div>
                <!--parti nom-->
                <form method="POST">
                  <div class="input-group mb-3 mt-2">
                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-comment"></i></span>
                    <input type="text" class="form-control" type="text" name="commentaire" id="commentaire" required>
                  </div>
                  <!--partie bouton-->
                  <div class="col-md-6">
                    <input type="submit" class="btn btn-secondary" value="Ajouter">
                  </div>
                </form>
              </div>
              <!--add image-->
              <div class="col-md-6 my-auto mt-5">
                <img src="../login/assets/images/comment-removebg-preview.png" class="img-fluid d-block mx-auto mb-4" alt="">
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>

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