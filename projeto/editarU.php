<?php
require_once 'coneção.php';
$id = $_GET['id'];

$sql = "SELECT * FROM adm WHERE id = '$id' ";
$resultado = mysqli_query($connect,$sql);
$dados = mysqli_fetch_array($resultado);

if (isset($_POST['btn-editar'])){
	$nome = addslashes(mysqli_escape_string($connect,$_POST['nome']));
	$email = addslashes(mysqli_escape_string($connect,$_POST['email']));
	$senha = addslashes(mysqli_escape_string($connect,$_POST['senha']));

	$sql = "UPDATE adm SET
	nome = '$nome', email = '$email', senha = '$senha' WHERE id = '$id' ";
	$resultado = mysqli_query($connect,$sql);
	header('location: visuUsuario.php');
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Editar Usuarios</title>
	<meta charset="utf-8">
	<style type="text/css">
	body{
	margin: 0;
	padding: 0;
	background-size: cover;
	font-family: "arial", sans-serif;
	background-color: #F0E68C;
}

.edit{
	width: 320px;
	height: 500px;
	color: #fff;
	background-color: rgba(0,0,5,0.8);
	top: 50%;
	left: 50%;
	position: absolute;
	transform: translate(-50%,-50%);
	box-sizing: border-box;
	padding: 68px 28px;
}

h1{
	margin: 0;
	padding-top: 0;
	padding-left: 0;
	padding-bottom: 20px;
	padding-right: 10px;
	text-transform: uppercase;
	text-align: center;
	font-size: 25px;
}

.edit p{
	margin: 0;
	padding: 0;
	font-weight: bold;
}

.edit input{
	width: 100%;
	margin-bottom: 21px;
}

.edit input[type="text"], input[type="email"], input[type="password"] {
	border: none;
	border-bottom: 1px solid width;
	background: transparent;
	outline: none;
	height: 40px;
	color: white;
	font-size: 16px;
}

.edit input[type="submit"]{
	border: none;
	outline: none;
	height: 35px;
	color: #000;
	background: #fff;
	border-radius: 20px;
	transition: 0.2s;
}

.edit input[type="submit"]:hover{
	cursor: pointer;
 	background: #DAA520;
 	transition: 0.2s;
}

.edit button{
	border: none;
	outline: none;
	height: 35px;
	width: 260px;
	color: #000;
	background: #fff;
	border-radius: 20px;
	transition: 0.2s;
	margin-bottom: 2%;
}

.edit a{
	text-decoration: none;
	color: black;
}

.edit button:hover{
	cursor: pointer;
	background: #4682B4;
	transition: 0.2s;
}
	</style>
</head>
<body>
	<div class="edit">
		<h1>Editar Usuarios!</h1>
		<form method="POST">
			<p>Nome</p>
			<input type="text" name="nome" placeholder="Nome do Usuario"
				value="<?php echo $dados['nome']; ?>">
			<p>Email</p>
			<input type="email" name="email" placeholder="Email do Usuario"
				value="<?php echo $dados['email']; ?>">
			<p>Senha</p>
			<input type="password" name="senha" placeholder="Senha do Usuario"
				value="<?php echo $dados['senha']; ?>">
			<input type="submit" name="btn-editar" value="Editar Usuario">
			<button><a href="visuUsuario.php">Voltar</a></button>
		</form>
	</div>
</body>
</html>