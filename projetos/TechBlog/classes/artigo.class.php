<?php

require_once'conexao.php';


class Artigo
{
	private $pdo;

	private $id;
	private $titulo;
	private $conteudo;
	private $autor;
	private $data;
	private $url;


	public function __construct(){
		$conexao = new Conexao();
		$db = $conexao->conectar();
		$this->pdo = $db;
	}


	function setId($id) { $this->id = $id; }

	function getId() { return $this->id; }

	function setTitulo($titulo) { $this->titulo = $titulo; }

	function getTitulo() { return $this->titulo; }

	function setConteudo($conteudo) { $this->conteudo = $conteudo; }

	function getConteudo() { return $this->conteudo; }

	function setAutor($autor) { $this->autor = $autor; }

	function getAutor() { return $this->autor; }

	function setData($data) { $this->data = $data; }

	function getData() { return $this->data; }

	function setUrl($url) { $this->url = $url; }

function getUrl() { return $this->url; }

	
	public function cadastrarArtigo(){

	$sql = "INSERT INTO artigo
		(titulo, conteudo, url) 
		VALUES 
		(:titulo, :conteudo, :url)";

	$stmt = $this->pdo->prepare($sql);

	$stmt->bindParam(':titulo', $this->titulo);
	$stmt->bindParam(':conteudo', $this->conteudo);
	$stmt->bindParam(':url', $this->url);

	$stmt->execute();

	}

	public function alterarArtigo($id){

	$sql = "UPDATE artigo 
	SET titulo = :titulo, conteudo = :conteudo, url = :url 
	WHERE id = :id";

	$stmt = $this->pdo->prepare($sql);

	$stmt->bindParam(':id', $id);
	$stmt->bindParam(':titulo', $this->titulo);
	$stmt->bindParam(':conteudo', $this->conteudo);
	$stmt->bindParam(':url', $this->$url);

	$stmt->execute();

	}

	public function excluirArtigo($id){

	$sql = "DELETE FROM artigo 
	WHERE id = :id";

	$stmt = $this->pdo->prepare($sql);

	$stmt->bindParam(':id', $id);

	$stmt->execute();

	}

	public function listarArtigos(){
		$sql = "SELECT * FROM artigo";

		$stmt = $this->pdo->prepare($sql);

		$stmt->execute();

		while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
			?>

			<tr>
    		<td><?php echo $row->titulo; ?></td>
    		<td><?php echo $row->autor; ?></td>
    		<td><?php echo $row->data; ?></td>
    		<td><a href="artigo.php?id=<?php print($row->id); ?>&url=<?php print($row->url); ?>">Ler</a></td>
  			</tr>

			<?php
		}
	}

	public function listarArtigo($id){
		$sql = "SELECT * FROM artigo WHERE id = :id";

		$stmt = $this->pdo->prepare($sql);

		$stmt->bindParam(':id', $id);

		$stmt->execute();

		while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
			?>

			<tr>
    		<td><?php echo $row->titulo; ?></td>
    		<td><?php echo $row->autor; ?></td>
    		<td><?php echo $row->data; ?></td>

  			</tr>

			<?php
		}
	}

	public function gerarUrl($titulo){

    $table = array(
        'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z',
        'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
        'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A',
        'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
        'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I',
        'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
        'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U',
        'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
        'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a',
        'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
        'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i',
        'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
        'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u',
        'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
        'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r',
    );
    // Traduz os caracteres em $string, baseado no vetor $table
    $titulo = strtr($titulo, $table);
    // converte para minúsculo
    $titulo = strtolower($titulo);
    // remove caracteres indesejáveis (que não estão no padrão)
    $titulo = preg_replace("/[^a-z0-9_\s-]/", "", $titulo);
    // Remove múltiplas ocorrências de hífens ou espaços
    $titulo = preg_replace("/[\s-]+/", " ", $titulo);
    // Transforma espaços e underscores em hífens
    $titulo = preg_replace("/[\s_]/", "-", $titulo);
    // retorna a string
    return $titulo;
}

	public function lerArtigo($id){

		$sql = "SELECT * FROM artigo WHERE id = :id";

		$stmt = $this->pdo->prepare($sql);
		$stmt->bindParam(':id', $id);

		$stmt->execute();

		while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {

			echo $row->titulo;
			echo $row->conteudo;

		}
	}



}