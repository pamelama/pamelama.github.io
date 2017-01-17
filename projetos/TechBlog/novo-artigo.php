<?php 

require_once 'classes/artigo.class.php';

$artigo = new Artigo();


if(isset($_POST['publicar'])){


$titulo = $_POST['titulo'];
$conteudo = $_POST['conteudo'];

$artigo->setTitulo($titulo);
$artigo->setConteudo($conteudo);

$url = $artigo->gerarUrl($titulo);


$artigo->setUrl($url);

$artigo->cadastrarArtigo();

}


 ?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Painel: Novo Artigo</title>

	<?php include_once'head-painel.php'; ?>

</head>
<body>

	<?php include_once 'menu-painel.php'; ?>
	
		<section class="container sombra round">
			<h2>Novo Artigo</h2>
			<form method="post">
			<div class="horizontal">
				<label for="titulo">Título</label>
				<input type="text" name="titulo">
			</div>
			<div class="horizontal">
				<textarea name="conteudo" id="conteudo" cols="30" rows="20"></textarea>
			</div>
			
			<button class="btn verde round" name="publicar" type="submit"><i class="fa fa-check" aria-hidden="true"></i> Publicar</button>
			<button class="btn laranja round"><i class="fa fa-pencil" aria-hidden="true"></i> Salvar Rascunho</button>
			</form>

		</section>
</body>