<?php 

include_once 'conexao.php';

class Autor
{
		private $id;
		private $nome;
		private $bio;
		private $email;
		private $senha;

	function __construct()
	{
		$conexao = new Conexao();
		$this->pdo = $conexao->conectar();
	}

		function setId($id) { $this->id = $id; }

		function getId() { return $this->id; }

		function setNome($nome) { $this->nome = $nome; }

		function getNome() { return $this->nome; }

		function setBio($bio) { $this->bio = $bio; }

		function getBio() { return $this->bio; }

		function setEmail($email) { $this->email = $email; }

		function getEmail() { return $this->email; }

		function setSenha($senha) { $this->senha = $senha; }

		function getSenha() { return $this->senha; }



	public function cadastrarAutor()
	{
		$sql = "INSERT INTO autor
		(nome, bio, email, senha) 
		VALUES (:nome, :bio, :email, :senha)";

		$stmt = $this->pdo->prepare($sql);

		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':bio', $this->bio);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':senha', $this->senha);

		$stmt->execute();
	}

	public function alterarAutor($id)
	{
		$sql = "UPDATE autor 
		SET nome = :nome, bio = :bio, email = :email  
		WHERE id = :id ";

		$stmt = $this->pdo->prepare($sql);

		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':bio', $this->bio);
		$stmt->bindParam(':email', $this->email);

		$stmt->execute();
	}

	public function listarAutores()
	{
		$sql = "SELECT * FROM autor";

		$stmt = $this->pdo->prepare($sql);

		$stmt->execute();

		while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
			?>

			<tr>
    		<td><?php echo $row->nome; ?></td>
    		<td><?php echo $row->email; ?></td>
  			</tr>

			<?php
	}
}

	public function listarAutor($id)
	{
		$sql = "SELECT * FROM autor WHERE id = :id";

		$stmt = $this->pdo->prepare($sql);

		$stmt->bindParam(':id', $id);

		$stmt->execute();

		while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
			?>

			<tr>
    		<td><?php echo $row->nome; ?></td>
    		<td><?php echo $row->email; ?></td>
  			</tr>

			<?php
		}

	}

	public function excluirAutor($id)
	{
		$sql = "DELETE FROM autor WHERE id = :id";

		$stmt = $this->pdo->prepare($sql);

		$stmt->bindParam(':id', $id);

		$stmt->execute();
	}

	public function login()
	{
		$sql = "SELECT * FROM autor WHERE email = :email";

		$stmt = $this->pdo->prepare($sql);

		$stmt->bindParam(':email', $this->email);

		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_OBJ);

		if (count($row) > 0) {
			$verificacao = password_verify($senha, $row['senha']);

			return $verificacao;
		}
	}
}