<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<?php 

		session_start();

		require('config.php');

		$sql = "SELECT * FROM artigos";

		$query = mysqli_query($conexao, $sql);

		if (isset($_POST['coment'])) {
			$coment = $_POST['coment'];

			$fk = $_SESSION['id_fk'];
			$artigo = $_SESSION['nome_ar'];

			$sql_coment = "INSERT INTO `comentarios`(`artigo`, `comentario`, `data`, `id_coment`) VALUES ('$artigo', '$coment', NOW(), '$fk')";

			$query_coment = mysqli_query($conexao, $sql_coment);

			if ($query_coment) {
					echo "<script type='text/javascript'>
	 					alert('Comentado!!');
	 					location.href = 'index.php?opc=home';
	 				  </script>";
			}
		} else {
			
		}
	?>

</head>
<body>

	<div style="margin-top: 150px;" class="container">
		<h1>TODOS OS ARTIGOS ESCRITOS</h1>
		<br><br>
		<div class="row">
		<?php 

			if (mysqli_num_rows($query) > 0) {
					while ($art = mysqli_fetch_assoc($query)) {

						$_SESSION['id_fk'] = $art['id_artigo_fk'];
						$_SESSION['nome_ar'] = $art['titulo'];

						echo "
						<div class='col-md-12 thumbnail'>
							<b><h3 class='text-center'>".$art['titulo']."</h3></b>
							<i>
								<b><p class='text-right'>Data:
								".substr($art['data'], 8, 2)."/".substr($art['data'], 5, 2)."/"
								.substr($art['data'], 0, 4)."</p></b>
							</i>
							<h5 class='text-justify'>".$art['conteudo']."</h5>
							<b><i class='text-left'>Autor: ".$art['autor'].".</i></b>
							<br><br><br>
							<div class='col-md-6'>
								<form method='post'>
								<legend>Comentar</legend>
								<textarea class='form-control' rows='5' name='coment' placeholder='Comente aqui'></textarea>
								<br>
								<button type='submit' class='btn btn-info'>Comentar</button>
								</form>
								<br>
							</div>
						</div>
					";
					}
				} else {
					echo "
						<form method = 'get'>
							<h3>Sem artigos!!</h3>
						</form>
					";
				}

		 ?>
		</div>
	</div>
</body>
</html>