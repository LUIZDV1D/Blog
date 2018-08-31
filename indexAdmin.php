<!DOCTYPE html>
<html>
<head>
	<title>Administração</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="shortcut icon" type="x-icon" href="images/Blogger.png">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<?php 

	require('config.php');
	session_start();

	$usuario = $_SESSION['user_admin'];

	if (isset($_GET['opc'])) {
		$opc = $_GET['opc'];

		if ($opc == 'home') {
			header('location:indexAdmin.php');
		}

		if ($opc == 'sair') {
			session_destroy();
			header('location:index.php?opc=home');
		}
	}

	if (isset($_GET['acao']) && isset($_GET['id'])) {
		$acao = $_GET['acao'];
		$id_apaga = $_GET['id'];

		if ($acao == 'apagar') {
			if ($id_apaga != '1') {
				
			$sql = "DELETE FROM `users` WHERE id = '".$id_apaga."'";
			$query = mysqli_query($conexao, $sql);

			if ($query) {

				$sql_artigos = "DELETE FROM `artigos` WHERE id_artigo_fk = '".$id_apaga."'";
				$query_artigos = mysqli_query($conexao, $sql_artigos);

				echo "<script type='text/javascript'>
	 					alert('Apagado com sucesso!!');
	 					location.href = 'indexAdmin.php';
	 				  </script>";
			} else {
				echo "<script type='text/javascript'>
	 					alert('Erro!!');
	 				  </script>";
			}
		} else {
			echo "<script type='text/javascript'>
	 					alert('Esse usuário não pode ser apagado!!');
	 				  </script>";
		}
		}
	}

	$sql = "SELECT * FROM users";
	$query = mysqli_query($conexao, $sql);

	 ?>

</head>
<body>

	<div style="margin-top: 150px;" class="container">
		<nav class="navbar navbar-fixed-top" style="background: #00b8ff;">
			<form method="get" style="border: 1px solid black;">
				<a href="?opc=home">
					<img style=" position: abolute; width: 5%; margin-left: 60px; margin-top: 18px;" src="images/Blogger.png">
				</a>
				<h3 style=" position: absolute; color: white; 
					margin-top: -44px; margin-left: 560px;">

					Bem-vindo, <b><?php echo strtoupper("$usuario");?>.</b>

				</h3>
				<h3>
					<a style=" position: absolute; text-decoration: none; color: white; 
					margin-top: -64px; margin-left: 1250px;" href="?opc=sair">
						Sair <i class="far fa-times-circle"></i>
					</a>
				</h3>
			</form>
		</nav>

		<div class="row">
			<div class="col-md-12">
				<table class="table table-hover">
  					<thead>
   						<tr>
      						<th scope="col">#</th>
      						<th scope="col">Nickname</th>
      						<th scope="col">E-mail</th>
      						<th scope="col">Ações</th>
						</tr>
  					</thead>
  							<?php 

  								while ($linhas = mysqli_fetch_assoc($query)) {
  									echo "
  										<tr>
  										<th>".$linhas['id']."</th>
  										<td>".$linhas['user']."</td>
  										<td>".$linhas['email']."</td>
  										<td><a style='color: red;' href='?acao=apagar&id=".$linhas['id']."'><i class='far fa-trash-alt'></i></a></td>
  										</tr>	
  									";
  								}

  							 ?>

  					<tbody>
  					</tbody>
				</table>
			</div>
		</div>
	</div>

</body>
</html>