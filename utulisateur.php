<?php
// Inclure le fichier de configuration
require_once('config.php');
// Récupérer les valeurs de chaque champ
$titre = $_POST['titre'];
$description = $_POST['description'];
$nb_personnes = $_POST['nb_personnes'];
$temps_preparation = $_POST['temps_preparation'];
$temps_cuisson = $_POST['temps_cuisson'];
$difficulte = $_POST['difficulte'];
$cout = $_POST['cout'];
$temps_repos = $_POST['temps_repos'];


// Récupérer les ingrédients et les quantités
$ingredient = $_POST['ingredient'];
$etape = $_POST['etape'];
$Astuce = $_POST['Astuce'];