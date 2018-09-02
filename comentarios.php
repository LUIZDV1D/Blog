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

	?>

</head>
<body>

	<div style="margin-top: 150px;" class="container">

		<div class="row">
			<table class="table table-hover">
  					<thead>	<h3>Comentários</h3>
   						<tr>
      						<th scope="col">#</th>
      						<th scope="col">Artigo</th>
      						<th scope="col">Comentário</th>
      						<th scope="col">Data/Hora</th>
      						<th scope="col">Ações</th>
						</tr>
  					</thead>

  					<tbody>
  					
				
			<?php 

			$usuario = $_SESSION['user'];
			$id_usu = $_SESSION['id_user'];

			$sql = "SELECT * FROM comentarios WHERE id_coment = '".$_SESSION['id_art_coment']."'";

			$query = mysqli_query($conexao, $sql);

				if (mysqli_num_rows($query) > 0) {
					while ($art = mysqli_fetch_assoc($query)) {
						
						echo "
							<tr>
								<th>".$art['id']."</th>
								<td>".$art['artigo']."</td>
								<td>".substr($art['comentario'], 0, 20)."</td>
								<td>".$art['data']."</td>
								<td>
								<a style='color: green;' href='?opc=verComent&id_art=".$art['id']."'><i class='far fa-eye'></i></a>  |  <a style='color: red;' href='?opc=apagar_coment&id_com=".$art['id']."'><i class='far fa-trash-alt'></i></a> 
								</td>	
							</tr>
						";
					}
				} else {
					echo "
						<tr>
						<td><form method = 'get'>
							<h3>Sem comentários!!</h3>
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