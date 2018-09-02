<!DOCTYPE html>
<html>
<head>
	<title>Blog de Inglês</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="shortcut icon" type="x-icon" href="images/Blogger.png">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<?php 

	session_start(); 	

	$usuario = $_SESSION['user'];

	if (isset($_GET['opc'])) {
		$opc = $_GET['opc'];

		if ($opc == 'home') {
			header('location:indexLogado.php');
		}

		if ($opc == 'sair') {
			session_destroy();
			header('location:index.php?opc=home');
		}

		if ($_GET['opc'] == 'escrever') {
			header('location:escrever.php');
		}

		if ($_GET['opc'] == 'lista') {
			include('Artigos.php');
		}

		if ($_GET['opc'] == 'escrever') {
			header('location:escrever.php');
		}

		if ($_GET['opc'] == 'verArt') {
			include('verArtigo.php');
		}

		if ($_GET['opc'] == 'altArt') {
			include('altArtigo.php');
		}

		if ($_GET['opc'] == 'apagar') {
			include('apagar.php');			
		}
	}

	 ?>

</head>
<body>

	<div class="container-fluid">
		<nav class="navbar navbar-fixed-top" style="background: #00b8ff;">
			<form method="get" style="border: 1px solid black;">
				<a href="?opc=lista">
					<img style=" position: abolute; width: 5%; margin-left: 60px; margin-top: 18px;" src="images/Blogger.png">
				</a>
				<h3 style=" position: absolute; color: white; 
					margin-top: -44px; margin-left: 550px;">

					Bem-vindo, <b><?php echo strtoupper("$usuario");?>.</b>

				</h3>
				<h3>
					<a style=" position: absolute; text-decoration: none; color: white; 
					margin-top: -64px; margin-left: 1250px;" href="?opc=sair">
						Sair <i class="far fa-times-circle"></i>
					</a>
				</h3>
				<h3>
					<a style=" position: absolute; text-decoration: none; color: white; 
					margin-top: -64px; margin-left: 1100px;" href="?opc=escrever">
						Escrever
					</a>
				</h3>
			</form>
		</nav>
	</div>

</body>
</html>