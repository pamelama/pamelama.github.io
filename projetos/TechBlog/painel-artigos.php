<?php 

  require_once 'classes/artigo.class.php';

  $artigo = new Artigo();


 ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Painel: Artigos</title>

  <?php include_once'head-painel.php'; ?>

</head>
<body>

  <?php include_once 'menu-painel.php'; ?>

	<section class="container round sombra">
	<h2 class="titulo-secao">Todos os Artigos</h2>
	<button class="btn-novo azul round"><a href="novo-artigo" class="a-btn"><i class="fa fa-plus" aria-hidden="true"></i> Novo Artigo</a></button>
		<table class="round">
  <tr>
    <th>Título</th>
    <th>Autor</th>
    <th>Data</th>
    <th>Ler</th>
  </tr>

<?php 

  $artigo->listarArtigos(); 


  ?>
  
</table>
	</section>
</body>
</html>