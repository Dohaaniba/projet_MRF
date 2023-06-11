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
            header("Location: menu.php?success=Your informations has been send successfully...");
         exit();
       }else {
               header("Location: menu.php?error=unknown error occurred!");
            exit();
       }

        //header("Location: dessert.php");
        //die;
    
    }
    else {
        echo "s'il vous plait entrer des informations valide !";
    }
}
else {
  echo "request vide";
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
  <link rel="stylesheet" href="../login/assets/css/projetcss.css">
  <title>MRF</title>
</head>
<body>
   <!--navclass-->
   <nav class="navbar navbar-expand-lg bg-body-tertiary py-6 fixed-top">
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
          <input class="form1-control mr-2" id="search" type="search" placeholder="Search" aria-label="Search">
          <a href="" style="color:black;"><i class="bi bi-search" ></i></a>
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
  <section class="pt-4 pt-md-11">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-md-5 col-lg-6 order-md-2">
          <!-- Image -->
          <img src="../login/assets/images/vosrecettes.png" id="images" class="img-fluid mw-md-150 mw-lg-130 mb-6 mb-md-0 aos-init aos-animate"  alt="..." data-aos="fade-up" data-aos-delay="100" width="100%">
        </div>
        <div class="col-12 col-md-7 col-lg-6 order-md-1 aos-init aos-animate" data-aos="fade-up">
          <!-- Heading -->
          <h1 class="display-3 text-center text-md-start">
            Bienvenue dans notre espace de <span class="text-warning">  partage </span><br>
             de cuisine ! <br>  
          </h1>
          <!-- Text -->
          <p class="lead text-center text-md-start text-muted mb-6 mb-lg-8">
            Vous êtes invités à partager votre propre version de la cuisine marocaine en toute liberté.
          </p>
          </div>
        </div>
      </div> <!-- / .row -->
    </div> <!-- / .container -->
  </section>
  <div class="area-main">
    <div class="row se" >
      <div class="small-12 columns">
        <h1 class="fs36 fontMedium mb10">Déposer une nouvelle recette</h1>
        <p class="mb30 hide-for-small">
          Utilisez ce formulaire pour sauvegarder et partager vos recettes avec votre famille, vos amis et les autres membres de Morrocan Food. Essayez d'être précis et clair pour que tous nos utilisateurs puissent réaliser votre recette sans problême !
        </p>
      </div>
      <form action="./traitement.php" method="post">
      <div class="large-8 large-centred colums add-recipe">
        <label for="titre_recette" class="fs20">Nom de la recette</label>
        <input name="titre" type="text" id="titre_recette" class="right" maxlength="120" placeholder="Choisissez un titre unique pour votre recette">
        <textarea name="description" id="ContentPlaceHolder_commentaires" placeholder="Laissez-nous un commentaire personnel sur votre recette ! Quelle est son histoire ? Pourquoi est-elle l'une de vos recettes préférées ? Mettez-nous l'eau à la bouche !" class="left"></textarea>
      </div>
    </form>
    </div>
    <div class="wrapper">
      <header>Selectionner une photo!</header>
      <form id="monformulaire" action="#">
        <input class="file-input" type="file" name="file" hidden>
        <i class="fas fa-cloud-upload-alt"></i>
        <p><b>Tapez ici!</b></p>
      </form>
      <section class="progress-area"></section>
      <section class="uploaded-area"></section>
    </div>
    
    <div class="container text-center my-container">
      <div class="row align-items-center">
        <div class="col-lg-4 d-flex align-items-center">
          <form action="./traitement.php" method="POST" >
          <h5 class="my-h5" >Temps de préparation</h5>  &nbsp; <i class="fa-solid fa-clock fa-lg"></i>
        </div>
        <div class="col d-flex align-items-center">
          <input name="temps_preparation" maxlength="2" id="tbTpsPrepaHeure" type="text" placeholder="00" onkeypress="return jsDecimals(event);">
          <label class="middle align-self-center mx-2 " style="font-size: 1.3em;">heures</label>
          <input name="temps_preparation" maxlength="2" id="tbTpsPrepaHeure" type="text" placeholder="00" onkeypress="return jsDecimals(event);">
          <label class="middle align-self-center mx-2 " style="font-size: 1.3em;">min</label>
        </div>
        
      </div>
    </div>
    <div class="container text-center my-container">
      <div class="row align-items-center">
        <div class="col-lg-4 d-flex align-items-center">
          <h5 class="my-h5" >Temps de cuisson</h5>  &nbsp; <i class="fa-solid fa-fire fa-lg"></i>
        </div>
        <div class="col d-flex align-items-center">
          <input name="temps_cuisson" maxlength="2" id="tbTpsPrepaHeure" type="text" placeholder="00" onkeypress="return jsDecimals(event);">
          <label class="middle align-self-center mx-2 " style="font-size: 1.3em;">heures</label>
          <input name="temps_cuisson" maxlength="2" id="tbTpsPrepaHeure" type="text" placeholder="00" onkeypress="return jsDecimals(event);">
          <label class="middle align-self-center mx-2 " style="font-size: 1.3em;">min</label>
        </div>
        
      </div>
    </div>
    <div class="container text-center my-container">
      <div class="row align-items-center">
        <div class="col-lg-4 d-flex align-items-center">
          <h5 class="my-h5" >Temps de repos</h5>  &nbsp; <i class="fa-solid fa-circle-pause fa-lg"></i>
        </div>
        <div class="col d-flex align-items-center">
          <input name="temps_repos" maxlength="2" id="tbTpsPrepaRepos" type="text" placeholder="00" onkeypress="return jsDecimals(event);">
          <label class="middle align-self-center mx-2 " style="font-size: 1.3em;">heures</label>
          <input name="temps_repos" maxlength="2" id="tbTpsPrepaRepos" type="text" placeholder="00" onkeypress="return jsDecimals(event);">
          <label class="middle align-self-center mx-2 " style="font-size: 1.3em;">min</label>
        </div>
      </div>
    </div>
    <div class="container text-center">
      <div class="row align-items-center">
        <div class="col-lg-4 d-flex align-items-center">
          <h5 class="my-h5" >Cout</h5>  &nbsp; <i class="fa-solid fa-euro-sign fa-lg"></i>
        </div>
        <div class="col d-flex align-items-center">
          <div class="large-5 medium-5 small-9 columns">
            <select name="cout" id="ContentPlaceHolder_ddlCout">
            <option selected="selected" value="-1">Non renseigné</option>
            <option value="1">Pas cher</option>
            <option value="2">Abordable</option>
            <option value="3">Assez cher</option>
</select>
          </div>
        </div>
      </div>
    </div>
    <div class="container text-center">
      <div class="row align-items-center">
        <div class="col-lg-4 d-flex align-items-center">
          <h5 class="my-h5" >Difficulté</h5>  &nbsp; <i class="fa-solid fa-user-chef"></i>
        </div>
        <div class="col d-flex align-items-center">
          <div class="large-5 medium-5 small-9 columns">
            <select name="difficulte" id="ContentPlaceHolder_ddlDifficulte">
              <option selected="selected" value="-1">Non renseigné</option>
              <option value="1">Facile</option>
              <option value="2">Intermédiaire</option>
              <option value="3">Difficile</option>
            </select>
        </div>
        </div>
      </div>
    </div>
    <div class="container text-center">
      <div class="row align-items-center">
        <div class="col-lg-4 d-flex align-items-center">
          <h5 class="my-h5" >Nombre de personnes</h5>  &nbsp; <i class="fa-solid fa-users fa-lg"></i>
        </div>
        <div class="col d-flex align-items-center">
          <div class="large-5 medium-5 small-9 columns">
            <input name="nb_personnes" type="text" id="ContentPlaceHolder_nombre_personne" class="text nombre_personne" maxlength="2" onkeypress="return jsDecimals(event);">
        </div>
        </div>
      </div>
    </div>
    <div id="ContentPlaceHolder_divCategory">
      <div class="titleBackGrey">Catégorie</div>
      <p class=" text-center text-md-start  mb-6 mb-lg-8">Classez votre recette parmi les catégories ci-dessous :</p>  
      <div class="container text-center">
        <div class="row align-items-center">
          <div class="col">
            <div class="card"  >
              <div class="face font">
                <img src="../login/assets/images/zaalok.jpeg" class="card-img-top" alt="...">
                <h3>Les entrées Marocaines</h3> 
                <p>tapez pour selectionner</p>
              </div>
              <!--fin div face font-->
              <div class="face back">
                <h3>Les entrées Marocaines</h3> 
                <p>Les entrées marocaines sont une variété de petits plats salés qui sont servis au début d'un repas marocain traditionnel.</p>
                <div class="link">
                  <a href="entree.html">Detaille</a>
                </div>
                <!--fin div link-->
              </div>
              <!--fin face back-->
              </div>
              <!--fin div card-->
            </div>
            <!--fin div col-->
            <div class="col" >
              <div class="card"  >
                <div class="face font">
                  <img src="../login/assets/images/tagine2.jpg" class="card-img-top" alt="...">
                  <h3>Les plats traditionnels</h3> 
                  <p>tapez pour selectionner</p>
                </div>
                <!--fin div face font-->
                <div class="face back">
                  <h3>Les plats traditionnels</h3> 
                  <p>Les plats traditionnels marocains sont un mélange savoureux de différentes épices et ingrédients qui créent une explosion de saveurs en bouche. </p>
                  <div class="link">
                    <a href="Plat Traditionnel.html">Detaille</a>
                  </div>
                  <!--fin div link-->
                </div>
                <!--fin face back-->
                </div>
                <!--fin div card-->
              </div>
              <!--fin div col-->
              <div class="col" >
                <div class="card"  >
                  <div class="face font">
                    <img src="../login/assets/images/shebakia.jpg" class="card-img-top" alt="...">
                    <h3>Les desserts Marocains</h3> 
                    <p>tapez pour selectionner</p>
                  </div>
                  <!--fin div face font-->
                  <div class="face back">
                    <h3>Les desserts Marocains</h3> 
                    <p>Les desserts marocains sont un délice pour les papilles avec leur mélange de saveurs sucrées et épicées. </p>
                    <div class="link">
                      <a href="dessert.html">Detaille</a>
                    </div>
                    <!--fin div link-->
                  </div>
                  <!--fin face back-->
                  </div>
                  <!--fin div card-->
                </div>
                <!--fin div col-->        
        <div class="titleBackGrey">Ingrédients</div>
        <textarea name="ingredient" id="ContentPlaceHolder_tbIngredient" textmode="MultiLine"></textarea>
        <div id="container">
          <div class="large-2 medium-2 small-6 columns" >
          <label style="font-size: 20px; margin-bottom: 15px;">Quantité</label>
          <input type="text" name="quantite[0]" value="" id="quantite" placeholder="ex:120">
        </div>
        <select class="auto-mesure" name="mesure[1]" id="mesure">
          <option value="">(Rien)</option>
          <option value="grammes">grammes (g)</option>
          <option value="kilogrammes">kilogrammes (kg)</option>
          <option value="litres">litres (l)</option>
          <option value="millilitres">millilitres (ml)</option>
          <option value="centilitres">centilitres (cl)</option>
          <option value="c. à café">c. à café</option>
          <option value="c. à soupe">c. à soupe</option>
          <option value="c. à thé">c. à thé</option>
        </select>
        <div class="large-6 medium-6 small-10 columns">
          <label style="font-size: 20px; margin-bottom: 15px;">Ingrédient</label>
          <input type="text" name="ingredient[0]" id="ingredient" class="ingredient" value="" autocomplete="off" placeholder="ex:farine">
        </div>
        <button id="addIngredientButton">Ajouter un ingrédient</button>
      </div>
      <!--fin container-->
      <div id="container1">
        <div class="large-11 medium-11 small-10 columns">
          <label style="font-size: 20px; margin-bottom: 15px;">Etape 1</label>
          <textarea name="etape" id="etape" placeholder="Veuillez entrer les instructions pour cette étape"></textarea>
        </div>
        <button id="addStepButton" type="button">Ajouter une étape</button>
      </div>
      <div class="titleBackGrey">Astuce</div>
      <textarea name="Astuce" id="ContentPlaceHolder_tbAstuce" textmode="MultiLine" placeholder="Veuillez ajouter une astuce, un truc en plus qui donnera envie de tester votre recette."></textarea>
      </div>
      <!--fin row align center -->        
  </div>
  <!--fin container text-->
  </div>
  <!--container placeholder-->
  <div class="grid text-center">
    <div class="g-col-4"><button  type="submit" id="publier" nom="submit">Publier ma recette</button></div>
    <div class="g-col-4"><button id="Annuler">Annuler</button></div>
  </div>
</form>
</div>
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
<!--fin area main-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="script.js"></script>
  
</body>
</html>