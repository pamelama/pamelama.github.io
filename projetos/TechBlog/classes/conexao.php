<?php
class Conexao
{   
    private $host = "localhost";
    private $banco = "techblog";
    private $usuario = "root";
    private $senha = "";
    public $pdo;
     
    public function conectar()
	{
       
        try
		{
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->banco;charset=UTF8" , $this->usuario, $this->senha);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        }
		catch(PDOException $e)
		{
            echo "ERRO: " . $e->getMessage();
        }
         
        return $this->pdo;
    }
}

