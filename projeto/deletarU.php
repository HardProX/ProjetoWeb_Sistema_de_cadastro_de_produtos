<?php
require_once "coneção.php";
$id = $_GET['id'];

if(isset($_POST['Deletar'])){
	$sql = "DELETE FROM adm WHERE id = '$id' ";
	$resultado = mysqli_query($connect,$sql);
	header('location: visuUsuario.php');
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Deletar Usuario</title>
	<meta charset="utf-8">
	<style type="text/css">
		body{
			background-color: #A52A2A
		}
		.principal{
			width: 400px;
			height: 240px;
			margin: 0 auto 0 auto;
			background-color: #B22222;
			position: relative;
			top: 90px;
		}

		.principal h1, h2{
			font-family: arial, sans-serif;
			color: #FFDEAD;
			text-align: center;
			text-shadow: 2px black;
		}

		.principal input[type="submit"]{
			padding: 10px;
			width: 200px;
			border-radius: 20px;
			border: none;
			outline: none;
			margin-left: 25%;
		}

		.principal input[type="submit"]:hover{
			background-color: #8B0000;
			cursor: pointer;
			transition: 0,2s;
		}

		.principal button{
			margin-top: 4%;
			padding: 10px;
			width: 200px;
			border-radius: 20px;
			border: none;
			outline: none;
			margin-left: 25%;
		}

		.principal a{
			text-decoration: none;
			color: black;
		}

		.principal button:hover{
			cursor: pointer;
			background: #4682B4;
			transition: 0.2s;
		}
	</style>
</head>
<body>
	<div class="principal">
		<h1>Tem certeza que deseja deletar?</h1>
		<h2>Isso é realmente necessario?</h2>
		<form method="POST">
			<input type="submit" name="Deletar" value="Deletar">
		</form>
		<button><a href="visuUsuario.php">Voltar</a></button>
	</div>
</body>
</html>