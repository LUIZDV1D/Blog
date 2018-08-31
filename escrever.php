<!DOCTYPE html>
<html>
<head>
	<title>Escrever</title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<?php 

	session_start();

	$user = $_SESSION['user'];

		require('config.php');

		if (isset($_POST['titulo']) && isset($_POST['cont'])) {

			$user = $_POST['titulo'];
			$cont = $_POST['cont'];
			$id = $_POST['id_a'];
			

			$sql_insere = "INSERT INTO artigos (titulo, conteudo, data, id_artigo_fk) VALUES ('$user', '$cont', NOW(), '$id')";


			$query = mysqli_query($conexao, $sql_insere);

			if ($query) {

				echo "<script type='text/javascript'>
	 					alert('Cadastrado com sucesso!!');
	 					location.href = 'indexLogado.php';
	 				  </script>";
			} else {
				echo "<script type='text/javascript'>
	 					alert('Preencha o(s) campo(s)!!');
	 				  </script>";
			}
		}

	 ?>

	 <style type="text/css">
	 	body {
	 		background-image: url('images/fundo.jpg');
	 		background-attachment: fixed;
	 	}
	 </style>

</head>
<body>

	<div style="margin-top: 30px;" class="container">
		<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
		<form method="post" id="form">
		  <fieldset>
		  <div class="form-group">
		   	<legend style=""><h2>Escrever artigo</h2></legend>
		  	<label for="email" style="">Título do artigo</label>
		    <input type="text" class="form-control" id="email" required name="titulo">
		  </div>
		  <div class="form-group">
		    <label for="pwd" style="">Conteúdo</label>
		    <textarea class="form-control" name="cont" rows="12" cols="48" placeholder="Escreva aqui..."></textarea>
		  </div>

		  <div class="form-group">
		    <label for="pwd">Seu ID de artigos</label>
		    	<?php 

		    		$usu = "SELECT id FROM users WHERE user = '".$user."'";

		    		$query2 = mysqli_query($conexao, $usu); 

		    	?>

		    <input type="text" value="<?php while($id2 = mysqli_fetch_assoc($query2)) {echo $id2['id'];}?>"
		    class="form-control" id="email" required name="id_a">
		  </div>

		  <button type="submit" class="btn btn-primary form-control">Concluir</button>
		  <br><br>
		  <a class="btn btn-danger form-control" href="indexLogado.php">voltar</a>
		  </form>
		  </fieldset>
	</div>
</body>
</html>