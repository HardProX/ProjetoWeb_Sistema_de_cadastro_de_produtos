<?php
session_start();

if(!isset($_SESSION['logado'])){
	header('location: logout.php');
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<style type="text/css">
		body{
			background: url("img/login-background.jpg");
			background-size: cover;
		}
		#menu{
			display: block;
			height: 70px;
			width: auto;
			margin-left: -6px;
			margin-right: -6px;
			background-color: #483D8B;
			position: relative;
			top: -15px;
		}
		#menu ul{
			list-style: none;
			text-transform: uppercase;
			text-align: left;
		}
		#menu li{
			display: inline-block;
			padding: 5px;
			background-color: #fff;
			margin-left: 3%;
			cursor: pointer;
		}
		#menu a{
			text-decoration: none;
			color: #6495ED;
		}

		#menu a:hover{
			color: #4682B4;
			transition: 0.2s;
		}
	</style>
</head>
<body>

	<div = id="menu">
		<nav>
			<ul>
				<li><a href="produtos.php">Cadastro de produtos</a></li>
				<li><a href="clientes.php">Cadastro de clientes</a></li>
				<li><a href="usuarios.php">Cadastro de usuarios</a></li>
				<li><a href="sobre.php">Sobre</a></li>
				<li><a href="logout.php">Sair</a></li>
			</ul>
		</nav>
	</div>

</body>
</html>