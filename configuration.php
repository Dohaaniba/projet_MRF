<?php
session_start();

include('connectionn.php');

if( $_SERVER['REQUEST_METHOD'=="POST"]){ // Vérifie si le formulaire a été soumis
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $temps_cuisson = $_POST['temps_cuisson'];
    $temps_repos = $_POST['temps_repos'];
    $cout = $_POST['cout'];
    $difficulte = $_POST['difficulte'];
    $nb_personnes = $_POST['nb_personnes'];
    $quantite = $_POST['quantite[0]'];
    $mesure = $_POST['mesure[1]'];
    $ingredient = $_POST['ingredient[0]'];
    $etape = $_POST['etape'];
    $Astuce = $_POST['Astuce'];
    $cout_str = implode(",", $cout);
    $difficulte_str = implode(",", $difficulte);
    $mesure_str = implode(",", $mesure);
    
    if (!empty($titre) && !empty($description) && !empty($temps_cuisson) && !empty($temps_repos) && !empty($cout) && !empty($difficulte) && !empty($nb_personnes) && !empty($quantite) && !empty($mesure)&& !empty($ingredient) && !empty($etape) && !empty($Astuce) ) {
        
       
        
        

        //save to data base
       
        $sql = "INSERT INTO contenue (titre, description, temps_cuisson, temps_repos, cout, difficulte, nb_personnes, quantite[0], mesure[1], ingredient[0], etape, Astuce) VALUES ('$titre', '$description', '$temps_cuisson', '$temps_repos', '$cout_str', '$difficulte_str', '$nb_personnes', '$quantite', '$mesure_str', '$ingredient', '$etape', '$Astuce')";
        $result=mysqli_query($connection,$sql); 
        if ($result !== 0) {
            header("Location: configuration.php?success=Your account has been created successfully...");
         exit();
       }else {
               header("Location: configuration.php?error=unknown error occurred!");
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

