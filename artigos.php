<!DOCTYPE html>
<html>
<head>
	<title>Artigos</title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<?php 

		session_start();

		$usuario = $_SESSION['user'];
		$id_usu = $_SESSION['id_user'];

		require('config.php');

		$sql = "SELECT * FROM artigos WHERE id_artigo_fk = '".$id_usu."'";

		$query = mysqli_query($conexao, $sql);

		if (isset($_GET['opc'])) {

			if ($_GET['opc'] == 'escrever') {
				header('location:escrever.php');
			}
		}

	?>

</head>
<body>

	<div style="margin-top: 150px;" class="container">

		<div class="row">
			<?php 

				if (mysqli_num_rows($query) > 0) {
					while ($art = mysqli_fetch_assoc($query)) {
						echo "
						<div class='col-md-4 thumbnail'>
							<b><h3>".$art['titulo']."</h3></b>
							<p>".substr($art['conteudo'], 0, 249)."</p>
							<form method='get'>
							<a class='btn btn-primary' href='?artigo=".$art['id']."'>Ver mais</a>
							</form>
						</div>
					";
					}
				} else {
					echo "
						<form method = 'get'>
							<h3>Sem artigos!!</h3>
							<b><p><a href='?opc=escrever'>Escreva algo!!</a></p></b>
						</form>
					";
				}

			 ?>
		</div>
		
	</div>
</body>
</html>