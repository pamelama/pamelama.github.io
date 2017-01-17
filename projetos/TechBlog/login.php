<?php 

require_once 'classes/autor.class.php';
require_once 'classes/funcoes.php';


$autor = new Autor();
$funcao = new Funcoes();

if(isset($_POST['entrar'])){

	$email = $_POST['email'];
	$senha = $_POST['senha'];

if ($funcao->validarEmail($email) == true) {
	
if ($autor->login == true) {
	header('Location: painel.php');
}
else{
	echo "Dados Inválidos";
}

}

}

 ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Login</title>

  <?php include_once'head-painel.php'; ?>

<style>
	.container-login{
		width: 25%;
		margin: 5% auto;
	}
</style>

</head>
<body>
<div class="container-login">
<form method="post">
	<input type="email" name="email">
	<input type="password" name="senha">
	<button type="submit" name="entrar" class="btn-novo">Entrar</button>
	</form>
</div>
</body>