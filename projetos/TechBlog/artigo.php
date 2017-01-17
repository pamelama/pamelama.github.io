<?php  ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<?php 

include_once 'classes/artigo.class.php';

$artigo = new Artigo();


$uri = explode("/",($_SERVER["REQUEST_URI"])); 
$id = $uri[4];


//$id = $_GET['id'];

$artigo->lerArtigo($id);


 ?>
	
</body>
</html>