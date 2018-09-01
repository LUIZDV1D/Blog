<!DOCTYPE html>
<html>
<head>
	<title>Alterar</title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
	<?php 

	session_start();

	require('config.php');

		$id = $_SESSION['art_id'];

	 ?>

	 <style type="text/css">
	 	body {
	 		background-image: url('images/fundo.jpg');
	 		background-attachment: fixed;
	 	}
	 </style>

</head>
<body>

	<div style="margin-top: 50px; margin-bottom: -20px;" class="container">

		<?php 
			if (isset($_POST['titulo']) && isset($_POST['cont'])) {
			
				$sql_update = "UPDATE artigos SET titulo = '".$_POST['titulo']."', conteudo = '".$_POST['cont']."', data= NOW() WHERE id = '".$id."'";

				$query_up = mysqli_query($conexao, $sql_update);

				if ($query_up) {
					echo "<script type='text/javascript'>
		 					alert('Alterado com sucesso!!');
		 					location.href = 'indexLogado.php';
		 				  </script>";
				} else {
					echo "<script type='text/javascript'>
		 					alert('Algo de errado não está certo!!');
		 				  </script>";
				}
			}
		?>

				<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-12">
					<form method="post" id="form">
					  <fieldset>
					  <div class="form-group">
					   	<legend style="color: white;"><h2>Alterar artigo</h2></legend>
					  	<label for="email" style="color: white;">Novo título</label>
					    <input required type="text" class="form-control" id="email" required name="titulo">
					  </div>
					  <div class="form-group">
					    <label for="pwd" style="color: white;">Conteúdo</label>
					    <textarea required class="form-control" name="cont" rows="12" cols="48" placeholder="Escreva aqui..."></textarea>
					  </div>

					  <button type="submit" class="btn btn-primary form-control">Alterar</button>
					  <br><br>
		  			  <a class="btn btn-danger form-control" href="indexLogado.php">voltar</a>
					  </form>
					  </fieldset>	
				</div>					
</body>
</html>