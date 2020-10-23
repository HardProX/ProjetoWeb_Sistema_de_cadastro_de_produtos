<?php
require_once 'coneção.php';
$cliente = addslashes(mysqli_escape_string($connect,$_POST['select']));

$sql = "SELECT * FROM clientes WHERE nome LIKE '$cliente%' ";
$resultado = mysqli_query($connect,$sql);


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Visualizar Clientes</title>
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


		#principal button{
			padding: 10px;
			margin-left: 30%;
			width: 200px;
			border: none;
			outline: none;
			transition: 0.2s;
		}

		#a{
			text-decoration: none;
			color: black;
		}

		#principal button:hover{
			cursor: pointer;
			background: #4682B4;
			transition: 0.2s;
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
		<button><a href="visuClientes.php" id="a">Voltar</a></button>
		<table>
				<tr>
					<th>Nome</th>
					<th>Telefone</th>
					<th>Endereço</th>
					<th>Debito</th>
				</tr>
			<?php
			if (mysqli_num_rows($resultado) > 0):
				while ($dados = mysqli_fetch_array($resultado)) : ?>	
				<tr>
					<td><?php echo $dados['nome'];  ?></td>
					<td><?php echo $dados['telefone']; ?></td>
					<td><?php echo $dados['endereço']; ?></td>
					<td><?php echo $dados['debito']; ?></td>
					<td><a href="editarC.php?id=<?php echo $dados['id'];?>" id="e">editar</a></td>
					<td><a href="deletarC.php?id=<?php echo $dados['id'];?>" id="d">deletar</a></td>
				</tr>
			<?php endwhile; 
				else:
			?>
			<tr>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
			</tr>
		<?php endif; ?>
		</table>
	</div>

</body>
</html>