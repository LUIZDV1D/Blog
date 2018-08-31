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
							<i><h5 class='text-right'>".$art['data']."</h5></i>
							<p>".$art['conteudo']."</p>
							<br><br><br><br><br>
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