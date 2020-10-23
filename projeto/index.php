<?php
require_once 'coneção.php';
session_start();


if(isset($_POST['btn-logar'])){
	$email = addslashes(mysqli_escape_string($connect,$_POST['email']));
	$senha = addslashes(mysqli_escape_string($connect,$_POST['senha']));
	$erros = array();

	if(empty($email) or empty($senha)){
		$erros[] = "Os campos EMAIL/SENHA precisam ser prenchidos corretamente";
	}else{
		$sql = "SELECT email FROM ADM WHERE email = '$email' ";
		$resultado = mysqli_query($connect,$sql);

		if(mysqli_num_rows($resultado) > 0){
			$sql = "SELECT * FROM ADM WHERE email = '$email' AND senha = '$senha' ";
			$resultado = mysqli_query($connect,$sql);

			if(mysqli_num_rows($resultado) == 1){
				$dados = mysqli_fetch_array($resultado);
				mysqli_close($connect);
				$_SESSION['logado'] = true;
				$_SESSION['id_usuario'] = $dados['id'];
				header('location: home.php');
			}else{
				$erros[] = "SENHA incorreta!";
			}
		}else{
			$erros[] = "usuario inexistente";
		}
	}
}

if(!empty($erros)){
	foreach ($erros as $erros) {
		$_SESSION['mensagem'] = $erros; ?>
		<script type="text/javascript">
			alert("<?php echo $_SESSION['mensagem']; ?>");
		</script> <?php
	}
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Login | senha</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<meta charset="utf-8">
</head>
<body style="background-color: #00BFFF;">

	<div class="login">
		<h1>Login</h1>
		<form method="POST">
			<p>Email</p>
			<input type="text" name="email" placeholder="Seu Email">
			<p>Senha</p>
			<input type="password" name="senha" placeholder="Sua senha">
			<input type="submit" name="btn-logar" value="login">
			<button type="submit"><a href="cadastro_úsuario.php">Cadastrar</a></button>
		</form>
	</div>

</body>
</html>