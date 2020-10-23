<?php
require_once 'coneção.php';

if(isset($_POST['btn-cadastrar'])){
	$nome = addslashes(mysqli_escape_string($connect,$_POST['nome']));
	$email = addslashes(mysqli_escape_string($connect,$_POST['email']));
	$senha = addslashes(mysqli_escape_string($connect,$_POST['senha']));
	$erros = array();

	if(empty($nome) or empty($email) or empty($senha)){
		$erros[] = "Preencha todos os campos!";
	}else{
		$sql = "INSERT INTO adm (nome,email,senha) VALUES ('$nome','$email','$senha')";
		$resultado = mysqli_query($connect,$sql);
		header('location: visuUsuario.php');
	}
}

if (!empty($erros)){
	foreach ($erros as $erros) { 
		$_SESSION['mensagem'] = $erros; ?>
		<script type="text/javascript">
			alert("<?php echo $_SESSION['mensagem']; ?>")
		</script> <?php
	}
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Cadastro de Úsuario</title>
	<meta charset="utf-8">
	<style type="text/css">
		body{
	margin: 0;
	padding: 0;
	background-size: cover;
	font-family: "arial", sans-serif;
	background-color: #7B68EE;
}

.login{
	width: 320px;
	height: 526px;
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

.login p{
	margin: 0;
	padding: 0;
	font-weight: bold;
}

.login input{
	width: 100%;
	margin-bottom: 21px;
}

.login input[type="text"], input[type="email"], input[type="password"] {
	border: none;
	border-bottom: 1px solid width;
	background: transparent;
	outline: none;
	height: 40px;
	color: white;
	font-size: 16px;
}

.login input[type="submit"]{
	border: none;
	outline: none;
	height: 35px;
	color: #000;
	background: #fff;
	border-radius: 20px;
	transition: 0.2s;
}

.login input[type="submit"]:hover{
	cursor: pointer;
 	background: #ff4d4d;
 	transition: 0.2s;
}

.login button{
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

.login a{
	text-decoration: none;
	color: black;
}

.login button:hover{
	cursor: pointer;
	background: #4682B4	;
	transition: 0.2s;
}
	</style>
</head>
<body>

	<div class="login">
		<h1>Cadastro de Usuario!</h1>
		<form method="POST">
			<p>Nome</p>
			<input type="text" name="nome" placeholder="nome do usuario">
			<p>Email</p>
			<input type="email" name="email" placeholder="email do usuario">
			<p>Senha</p>
			<input type="password" name="senha" placeholder="senha do usuario">
			<input type="submit" name="btn-cadastrar" value="Cadastrar">
			<button><a href="visuUsuario.php">Visualizar Usuarios</a></button>
			<button type="submit"><a href="home.php">Voltar</a></button>
		</form>
	</div>

</body>
</html>