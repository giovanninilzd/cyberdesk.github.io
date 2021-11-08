<?php
include("conexao.php");
$sql = "select * from cadastro";
$query = $mysqli->query($sql);
?>
<html>
<head>
<meta charset="utf-8" />
<title>Lista de Dados</title>
</head>

<body>

<table width="500" border="1" align="center">
  <tr>
    <th>ID</th>
    <th>NOME</th>
    <th>EMAIL</th>
    <th>CPF</th>
    <th>DATA DE NASCIMENTO</th>
	  <th>TELEFONE</th>
    <th>SENHA</th>
    <th>CEP</th>
    <th>EDITAR/EXCLUIR</th>
  </tr>
<?php
while($L = mysqli_fetch_array($query)) {
	$id        = $L["id"];
	$nome      = $L["nome"];
	$email = $L["email"];
	$CPF   = $L["CPF"];
	$data_nascimento     = $L["data_nascimento"];
	$telefone     = $L["telefone"];
  $senha     = $L["senha"];
  $CEP     = $L["CEP"];
	
	echo"
  <tr>
    <td>$id</td>
    <td>$nome</td>
    <td>$email</td>
    <td>$CPF</td>
    <td>$data_nascimento</td>
	 <td>$telefone</td>
    <td>$senha</td>
      <td>$CEP</td>
    <td><a href=\"editar.php?id=$id\">[Editar]</a> | 
	<a href=\"excluir.php?id=$id\">[Excluir]</a></td>
  </tr>\n";
}  
?>  
<?php
if(mysqli_fetch_array($query) < 1) {
	$mysqli->close();
}
?>
</table>
</body>
</html>
