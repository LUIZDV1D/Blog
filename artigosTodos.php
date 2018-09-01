<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<?php 

		require('config.php');

		$sql = "SELECT * FROM artigos";

		$query = mysqli_query($conexao, $sql);
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