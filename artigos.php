<!DOCTYPE html>
<html>
<head>
	<title>Artigos</title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<?php 

		session_start();

		$usuario = $_SESSION['user'];
		$id_usu = $_SESSION['id_user'];

		$_SESSION['art_id'] = $_GET['id_art'];

		require('config.php');

		$sql = "SELECT * FROM artigos WHERE id_artigo_fk = '".$id_usu."'";

		$query = mysqli_query($conexao, $sql);

	?>

</head>
<body>

	<div style="margin-top: 60px;" class="container">

		<div class="row">
			<table class="table table-hover">
  					<thead>	<h3>Artigos</h3>
   						<tr>
      						<th scope="col">#</th>
      						<th scope="col">Título</th>
      						<th scope="col">Data/Hora</th>
      						<th scope="col">Ações</th>
						</tr>
  					</thead>

  					<tbody>
  					
				
			<?php 

			$usuario = $_SESSION['user'];
			$id_usu = $_SESSION['id_user'];

			$sql = "SELECT * FROM artigos WHERE id_artigo_fk = '".$id_usu."'";

			$query = mysqli_query($conexao, $sql);

				if (mysqli_num_rows($query) > 0) {
					while ($art = mysqli_fetch_assoc($query)) {

						$_SESSION['id_art'] = $art['id'];
						echo "
							<tr>
								<th>".$art['id']."</th>
								<td>".$art['titulo']."</td>
								<td>".$art['data']."</td>
								<td>
								<a style='color: green;' href='?opc=verArt&id_art=".$art['id']."'><i class='far fa-eye'></i></a>  |  <a style='color: blue;' href='?opc=altArt&id_art=".$art['id']."'><i class='far fa-edit'></i></a>  |  <a style='color: red;' href='?opc=apagar&id_art=".$art['id']."'><i class='far fa-trash-alt'></i></a>
								</td>	
							</tr>
						";
					}
				} else {
					echo "
						<tr>
						<td><form method = 'get'>
							<h3>Sem artigos!!</h3>
							<b><p><a href='?opc=escrever'>Escreva algo!!</a></p></b>
						</form></td>
						</tr>
					";
				}

			 ?>
			 </tbody>
			 </table>
		</div>
	</div>	
	
</body>
</html>