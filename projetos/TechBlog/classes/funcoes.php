<?php

include_once 'conexao.php';


//leia mais
// strip tags to avoid breaking any html
/*$string = strip_tags($string);

if (strlen($string) > 500) {

    // truncate string
    $stringCut = substr($string, 0, 500);

    // make sure it ends in a word so assassinate doesn't become ass...
    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a href="/this/story">Read More</a>'; 
}
echo $string;*/

class Funcoes
{
	public function validarSenha($senha)
	{
		if (strlen($senha) >= 6) {
			
			$senha = password_hash($senha, PASSWORD_DEFAULT);
		}
		else{

			echo "A senha deve possuir 6 caracteres ou mais.";
			die();

		}
		
		return $senha;
	}

	public function validarNome($nome)
	{
		if (strlen($nome) > 2) {

		$nome = trim($nome);
		$nome = htmlspecialchars($nome);

		}

		else{
			echo "Nome inválido.";
			die();
		}
		
		return $nome;
	}

	public function validarEmail($email)
	{
		$v = filter_var($email, FILTER_VALIDATE_EMAIL);

			return $v;
	}
}