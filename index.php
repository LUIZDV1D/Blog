<!DOCTYPE html>
<html>
<head>
	<title>Blog de Inglês</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="shortcut icon" type="x-icon" href="images/Blogger.png">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<?php 


		if (isset($_GET['opc'])) {
			$opc = $_GET['opc'];

			if ($opc == 'login') {
				include('login.php');
			}

			if ($opc == 'cada') {
				include('cadastro.php');
			}

			if ($opc == 'home') {
				include('artigosTodos.php');
			}

		}

	 ?>

</head>
<body>

	<div class="container-fluid">
		<nav class="navbar navbar-fixed-top" style="background: #00b8ff;">
			<form method="get">
				<a href="?opc=home">
					<img style=" position: abolute; width: 5%; margin-left: 60px; margin-top: 18px;" src="images/Blogger.png">
				</a>
				<h3>
					<a style=" position: absolute; text-decoration: none; color: white; 
					margin-top: -64px; margin-left: 1250px;" href="?opc=login">
						Login <i class="fas fa-sign-in-alt"></i>
					</a>
				</h3>
				<h3 style=" position: absolute; color: white; 
					margin-top: -66px; margin-left: 1228px;">|</h3>
				<h3>
					<a style=" position: absolute; text-decoration: none; color: white; 
					margin-top: -64px; margin-left: 1080px;" href="?opc=cada">
						Cadastrar <i class="fas fa-plus"></i>
					</a>
				</h3>
			</form>
		</nav>
	</div>
	</div>

</body>
</html>