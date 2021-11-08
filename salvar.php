<?php

include("conexao.php");
$nome      	= $_POST["txNome"];
$email 	= $_POST["txEmail"];
$CPF   	= $_POST["txCPF"];
$data_nascimento    	= $_POST["txData_nascimento"]; 
$senha    	= $_POST["txSenha"];
$CEP    	= $_POST["txCEP"];
$telefone    	= $_POST["txTelefone"];
// direita pra esquerda, pelo metódo phost declarado no form joga para variável indo para o value //
$sql = "INSERT INTO cadastro (id, nome, email, CPF, data_nascimento, telefone, senha, CEP) 
			VALUES (NULL, '$nome', '$email', '$CPF', '$data_nascimento', '$telefone', '$senha', '$CEP')"; //atributo da tabela cadastro "Insert Into"
			//Value armazena o dado no banco de dados//
$query = $mysqli->query($sql);
		
$mysqli->close();
header("Location:./login.html");
?>
