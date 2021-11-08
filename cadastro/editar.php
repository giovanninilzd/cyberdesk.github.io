<?php
//inclui a conexão com o banco de dados
include("conexao.php");

$id = $_GET["id"];
//Atribui um tipo de dados para a variável. Uma espécie de conversão de dados.
// o $id é o codigo do usuário.

settype($id, "integer");

//Consulta na tabela cadastro. O código que está armazenada na tabela
//precisa ser é igual a variável do PHP.
$sql = "select * from cadastro where loja = $id";

$query = $mysqli->query($sql);
$dados  = mysqli_fetch_array($query);

//verifica as opções de radio do HTML
//["cod"] é o atributo que está vindo da tabela cadastro
if($dados["cadastro"] == "1") {
	$checkedI   = "checked=\"checked\"";
	$checkedE   = "";
} else {
	$checkedI   = "";
	$checkedE   = "checked=\"checked\"";
}	

$mysqli->close();

// Tudo que estiver entre[" "] no formulário abaixo, são os atributos
//da tabela aluno, ou seja, a variável $dados[" "]
?>

<meta charset="utf-8">
 <html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cadastro</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="salvar_edicao.php">

<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
  <h2 align="center"><strong>Edicao de Cadastro PHP/MYSQL </strong></h2>
  <table width="390" border="2" align="center">
    <tr>
      <td width="165">Nome</td>
      <td width="209"><input name="txNome" type="text" id="nome" value="<?php echo $dados["nome"];?>" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input name="txEmail" type="text" id="email" value="<?php echo $dados["email"];?>" /></td>
    </tr>
    
 <tr>
      <td>CPF</td>
      <td><input name="txCPF" type="text" id="CPF" value="<?php echo $dados["CPF"];?>" /></td>
    </tr>
	
	<tr>
      <td>Data de Nascimento</td>
      <td><input name="txdata_nascimento" type="text" id="data_nascimento" value="<?php echo $dados["data_nascimento"];?>" /></td>
    </tr>
		<tr>
      <td>Telefone</td>
      <td><input name="txTelefone" type="text" id="telefone" value="<?php echo $dados["telefone"];?>" /></td>
    </tr>
    <tr>
      <td>Senha</td>
      <td><input name="txSenha" type="text" id="senha" value="<?php echo $dados["senha"];?>" /></td>
    </tr>
    <tr>
      <td>CEP</td>
      <td><input name="txCEP" type="text" id="data_CEP" value="<?php echo $dados["CEP"];?>" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Gravar" style="cursor:pointer"/></td>
    </tr>
  </table>
</form>
</body>
</html>
