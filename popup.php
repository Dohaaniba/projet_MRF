<!DOCTYPE html>
<html>
<head>
	<title>Popup</title>
	<style type="text/css">
		.popup {
			position: fixed;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			background-color: orange;
			padding: 20px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
			z-index: 9999;
		}
		.popup__close {
			position: absolute;
			top: 0;
			right: 0;
			padding: 10px;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<div class="popup">
		<span class="popup__close" onclick="window.close()">X</span>
		<h2>Votre recette a été enregistrée avec succès !</h2>
		<p>Merci de votre contribution.</p>
	</div>
</body>
</html>
