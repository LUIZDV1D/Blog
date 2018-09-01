<!DOCTYPE html>
<html>
<head>
	<title>
		<?php 

			require('config.php');

			if (isset($_GET['id_art'])) {
				$artigo = $_GET['id_art'];

				echo "Artigo número: ". $artigo;
			}

		 ?>
	</title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>
<body>
	<div style="margin-top: 150px;" class="container-fluid">
		<?php 

			$sql = "SELECT * FROM artigos WHERE id = '".$artigo."'";
			$query = mysqli_query($conexao, $sql);

			if (mysqli_num_rows($query) > 0) {

				while ($art = mysqli_fetch_assoc($query)) {
						echo "
							<div class='col-md-12 thumbnail'>
								<b><h3>".$art['titulo']."</h3></b>
								<p>".$art['conteudo']."</p>
								<b><p class='text-right'>Escrito em:
								".substr($art['data'], 8, 2)."/".substr($art['data'], 5, 2)."/"
								.substr($art['data'], 0, 4)."</p></b>
							</div>
						";
				}
			} else {
				echo "
					<form method = 'get'>
						<h3>Artigo não encontrado!!</h3>
					</form>
				";
			}
		
		?>
	</div>

</body>
</html>