<?php 
		session_start();

		require('config.php');
			$sql_apaga = "DELETE FROM `artigos` WHERE id = '".$_GET['id_art']."'";
			
			$query_apaga = mysqli_query($conexao, $sql_apaga);

			if ($query_apaga) {

				$sql_co = "DELETE FROM `comentarios` WHERE id_coment = '".$_SESSION['id_art_coment']."'";

				$query_co = mysqli_query($conexao, $sql_co);

				echo "<script type='text/javascript'>
	 					alert('Apagado com sucesso!!');
	 					location.href = 'indexLogado.php?opc=lista';
	 				  </script>";
			} else {
				echo "<script type='text/javascript'>
	 					alert('Erro!!');
	 					location.href = 'indexLogado.php?opc=lista';
	 				  </script>";
			}
?>
