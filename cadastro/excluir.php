<?php

include("conexao.php");
$id = $_GET["id"];
settype($id, "integer");

$sql = "delete from cadastro where loja = $id";
$query = $mysqli->query($sql);
$query->affected_rows;
		
$mysqli->close();
header("Location: listar.php");
?>

