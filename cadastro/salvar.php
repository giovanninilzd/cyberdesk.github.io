<?php

include("conexao.php");
$id     = $_POST["txid"];
$nome      	= $_POST["txNome"];
$email 	= $_POST["txEmail"];
$CPF   	= $_POST["txCPF"]; 
$data_nascimento    	= $_POST["txData"];
$telefone    	= $_POST["txTelefone"];
$senha    	= $_POST["txSenha"];
$CEP    	= $_POST["txCEP"];

$sql = "INSERT INTO cadastro (id, nome, email, CPF, data_nascimento, telefone, senha, CEP)
			VALUES (NULL, '$nome', '$email', '$CPF', '$data_nascimento', '$telefone', '$senha', '$CEP')";
$query = $mysqli->query($sql);
		
$mysqli->close();
header("Location:./login.html");
?>
