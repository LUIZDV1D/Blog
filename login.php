<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<?php 

		require('config.php');

		session_start();

		if (!empty($_POST['user'])) {
			

			$sql = "SELECT user, senha FROM users WHERE user = '".$_POST['user']."' AND senha = '".$_POST['pass']."'";

			$sql_key = "SELECT * FROM users WHERE user = '".$_POST['user']."' AND senha = '".$_POST['pass']."'";

			$query2 = mysqli_query($conexao, $sql_key);

			while ($dado = mysqli_fetch_assoc($query2)) {
				$_SESSION['id_user'] = $dado['id'];
			}

			$query = mysqli_query($conexao, $sql);

			if (mysqli_num_rows($query) > 0) {

				if ($_POST['user'] != 'admin') {

				$_SESSION['user'] = $_POST['user'];

				echo "<script type='text/javascript'>
	 					alert('Logado com sucesso!!');
	 					location.href = 'indexLogado.php?opc=lista';
	 				  </script>";

			} else {
				if($_POST['user'] == 'admin') {
					$_SESSION['user_admin'] = $_POST['user'];
				echo "<script type='text/javascript'>
	 					alert('Logado com sucesso!!');
	 					location.href = 'indexAdmin.php';
	 				  </script>";
				}
			}
			} else {
				echo "<script type='text/javascript'>
	 					alert('Usuário e/ou senha incorreto(s) ou inexistente(s)');
	 				  </script>";
			}
		}

	 ?>

</head>
<body>

	<div style="margin-top: 150px;" class="container">
		<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
		<form method="post" id="form">
		  <fieldset>
		  <div class="form-group">
		   	<legend>Login</legend>
		  	<label for="email">Usuário</label>
		    <input type="text" class="form-control" id="email" required name="user">
		  </div>
		  <div class="form-group">
		    <label for="pwd">Senha:</label>
		    <input type="password" class="form-control" id="pwd" required name="pass">
		  </div>
		  <button type="submit" class="btn btn-primary form-control">Entrar</button>
		  </form>
		  </fieldset>
	</div>
</body>
</html>