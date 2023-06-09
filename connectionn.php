<?php
$dbhost ="localhost";
$dbuser="root";
$dbpass="";
$dbname="recipes";
$connexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

 if (!$connexion = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
 {

    die("filed to connect !");
 }