<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<?php 

		require('config.php');

		if (isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['email'])) {

			$user = $_POST['user'];
			$pass = $_POST['pass'];
			$email = $_POST['email'];

			

			$sql_insere = "INSERT INTO users (user, senha, email) VALUES ('$user', '$pass', '$email')";


			$query = mysqli_query($conexao, $sql_insere);

			if ($query) {

				echo "<script type='text/javascript'>
	 					alert('Cadastrado com sucesso!!');
	 					location.href = 'index.php';
	 				  </script>";
			} else {
				echo "<script type='text/javascript'>
	 					alert('Preencha o(s) campo(s)!!');
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
		   	<legend>Cadastrar</legend>
		  	<label for="email">Usuário</label>
		    <input type="text" class="form-control" id="email" required name="user">
		  </div>
		  <div class="form-group">
		  	<label for="email">E-mail</label>
		    <input type="text" class="form-control" id="email" required name="email">
		  </div>
		  <div class="form-group">
		    <label for="pwd">Senha:</label>
		    <input type="password" class="form-control" id="pwd" required name="pass">
		  </div>
		  <button type="submit" class="btn btn-primary form-control">Cadastrar</button>
		  </form>
		  </fieldset>
	</div>
</body>
</html>