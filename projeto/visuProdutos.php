<?php
require_once 'coneção.php';

$sql = "SELECT * FROM produtos";
$resultado = mysqli_query($connect,$sql);


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Visualizar produtos</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<style type="text/css">
		body{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			background-color: #6959CD;
			font-family: "arial", sans-serif;
		}

		#principal{
			width: 600px;
			height: auto;
			margin: 0 auto 0 auto;
			position: relative;
			top: 90px;
			background-color: #87CEEB;
		}

		#principal form{
			margin-left: 1%;
			margin-bottom: 1%;
			margin-top: 1%;
		}

		#principal input[type = "text"]{
			padding: 10px;
			outline: none;
		}

		#principal button#one{
			padding: 10px;
			margin-left: -6px;
		}

		#principal button#two{
			padding: 10px;
			margin-left: 40%;
		}

		#principal table{
			color: #fff;
			padding: 2px;
		}

		#principal th, td{
			padding: 10px;
			text-align: center;
			text-transform: uppercase;
		}

		#principal a{
			text-decoration: none;
			color: #4682B4;
		}

		#e:hover{
			color: #DAA520;
		}

		#d:hover{
			color: #8B0000;
		}


	
	</style>
</head>
<body>

	<div id="principal">
		<form method="POST" action="pesquisaP.php">
			<input type="text" name="select" placeholder="Digite o nome do produto">
			<button id="one"><i class="fa fa-search fa-lg"></i></button>
			<button id="two"><a href="produtos.php">Voltar</a></button>
		</form>
		<table>
				<tr>
					<th>Nome</th>
					<th>Preço</th>
					<th>Quantidades</th>
				</tr>
			<?php
			if (mysqli_num_rows($resultado) > 0):
				while ($dados = mysqli_fetch_array($resultado)) : ?>	
				<tr>
					<td><?php echo $dados['nome'];  ?></td>
					<td><?php echo number_format($dados['preço'], 2, ',', '.'); ?></td>
					<td><?php echo $dados['quantidade']; ?></td>
					<td><a href="editarP.php?id=<?php echo $dados['id'];?>" id="e">editar</a></td>
					<td><a href="deletarP.php?id=<?php echo $dados['id'];?>" id="d">deletar</a></td>
				</tr>
			<?php endwhile; 
				else:
			?>
			<tr>
				<td>-</td>
				<td>-</td>
				<td>-</td>
			</tr>
		<?php endif; ?>
		</table>
	</div>

</body>
</html>