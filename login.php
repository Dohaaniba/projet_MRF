<?php 
session_start();


	include("connectio.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$usefnam = $_POST['nom'];
		$password = $_POST['password'];
    echo "yes";


			//read from database
			$query = "select * from users where nom = '$usefnam' limit 1";
			$result = mysqli_query($con, $query);
				if(mysqli_num_rows($result) > 0)
				{
          echo"yes";
          $user_data = mysqli_fetch_assoc($result);
					$_SESSION['user_id'] = $user_data['id'];
          header('Location: principale.php');
				}

			echo "wrong username or password!";
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../login/assets/css/login.css">
    <title>Page Login</title>
</head>
<body>
  <section> <!--section de la page -->
    <div class="imgBx">
      <img src="../login/assets/images/ora.jpg" alt="">
    </div>
    <div class="contentBx">
      <div class="formBx">
        <a href="#" class="navbar-brand">
          <img src="../login/assets/images/logojdid.png.png" alt="LOGO "width="44px" height="68px" >
        </a>
        <h2>Connectez-vous à votre compte !</h2>
        <form method="post">
          <div class="inputBx">
            <span>Nom utulisateur</span>
            <input type="text" name="nom">
          </div>
          <div class="inputBx">
            <span>Mot de passe</span>
            <input type="password" name="password">
          </div>
          <div class="remember">
            <label><input type="checkbox" name="">Se souvenir de moi</label>
          </div>
          <div class="inputBx">
            <input type="submit" value="Sign in" >
          </div>
          <div class="inputBx">
            <a href="#">Mot de passe oublié ?</a>
            <p>Vous n'avez pas un compte ? <a href="./signup.php">Enregistrez-vous ici !</a></p>
          </div>
        </form>
      </div>
    </div>
  </section>
</body>
</html>