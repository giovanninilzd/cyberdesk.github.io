<?php

include("conexao.php");

$id   = $_POST["txid"];
$nome  = $_POST["txNome"];
$email = $_POST["txEmail"];
$CPF   = $_POST["txCPF"];
$data_nascimento     = $_POST["txData_nascimento"];
$telefone 	= $_POST["txTelefone"];
$senha    = $_POST["txSenha"];
$CEP  = $_POST["txCEP"];

$sql = "UPDATE aluno SET nome = '$nome', email = '$email', CPF = '$CPF', 
data_nascimento= '$data_nascimento', telefone = '$telefone', senha = '$senha', CEP = '$CEP', WHERE cadastro.id = $id";
$query = $mysqli->query($sql);

$mysqli->close();
header("Location: listar.php");
?>
