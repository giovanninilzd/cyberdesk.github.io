
<?php
    require_once ('Dao.php');
    $consulta = new Dao();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./estilo.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="img\phonebok.ico">
    <title>CyberDesk - Cadastro</title>
</head>
<body>    
        <div id="topo">
        
        </div>
        <div id="logo">
         <img src="./img/logo3.png" alt="">
            </div>




    <?php       
        
        if(isset ($_POST['nome']))        
        //SELEÇÃO CADASTRAR OU EDITAR 
        {           
                        
            if (isset($_GET['id_up']) && !empty($_GET['id_up'])) {
                
                $id_upda = addslashes($_GET['id_up']);
                $nome = $_POST['nome'];
                $quantidade = $_POST['quantidade'];
                $preco = $_POST['preco'];
                if(!empty($nome) && !empty($quantidade) && !empty($preco)){
                   
                    $consulta->updateCliente($id_upda, $nome, $quantidade, $preco);
                    header('location:index.php');
                } 
                
                
            }

            else
            //------------------------cadastrar------------------
            {

                $nome = $_POST['nome'];
                $quantidade = $_POST['quantidade'];
                $preco = $_POST['preco'];
                
                if(!empty($nome) && !empty($quantidade) && !empty($preco)){
                   
                    if(!$consulta->insertCliente($nome,$quantidade,$preco)){
                        ?>
                        <div class="aviso">
                            <h3>CPF JÁ CADASTRADO NESTA BASE!</h3>
                        </div>
                    <?php
                    }
                } 
                else
                    {
                        ?>
                        <div class="aviso">
                            <h3>FAVOR PREENCHER TODOS OS DADOS PARA EXECUTAR O CADASTRO!</h3>
                        </div>
                    <?php
                    }

                }
            
        } 
    ?>

    <?php
        if (isset($_GET['id_up'])){

            $id_update = addslashes($_GET['id_up']);
            $res = $consulta->selectDadoCliente($id_update);            
        }
    ?>
    <section id="formulario">
        <form method="POST">
            <h2>CADASTRAR:</h2>
            <div>
                <label for="nome" id="nome">Nome do Produto: </label>
                <input type="text" name="nome" id="nome" value="<?php if(isset($res)){echo $res['NOME'];}?>">
            </div>
            <div>
                <label for="quantidade" id="quantidade">Quantidade: </label>
                <input type="text" id="quantidade" name="quantidade"value="<?php if(isset($res)){echo $res['QUANTIDADE'];}?>">
            </div>
            <div>
                <label for="preco" id="preco">Preço: </label>
                <input type="text" id="preco" name="preco"value="<?php if(isset($res)){echo $res['PRECO'];}?>">
            </div>
            <input type="submit" id="btncadastrar" name="btncadastrar" value="<?php if(isset($res)){echo'ATUALIZAR';} 
            else{ echo 'CADASTRAR';} ?>">
        </form>
    </section>
    <section id="consulta">    
        <table>
            <tr id="titulo">
                <td>NOME DO PRODUTO:</td>
                <td>QUANTIDADE:</td>
                <td colspan="2">PREÇO:</td>
            </tr>
            <?php
            
                $dados = $consulta->selectAll();

                if (count($dados) > 0){
                    for ($i=0; $i < count($dados) ; $i++) { 
                        echo"<tr>";
                        foreach ($dados[$i] as $key => $value) {
                            if($key!="ID"){
                                echo"<td>".$value."</td>";
                            }
                        }
            ?>
                        <td>                            
                            <a href="index.php?id_up=<?php echo $dados[$i]['ID'];?>">ALTERAR</a>
                            <a href="index.php?ID=<?php echo $dados[$i]['ID'];?>">EXCLUIR</a>
                        </td>
            <?php
                        echo"</tr>";
                    }                   
                    
                } else{

                    ?>
                        <div class="aviso">
                            <h3>NÃO EXISTEM DADOS CADASTRADOS!</h3>
                        </div>
                    <?php
                }

            ?>
            
        </table>
    </section>
</body>

</html>

<?php
    if(isset($_GET['ID'])){
        $id_cliente = addslashes($_GET['ID']);
        $consulta->deleteCliente($id_cliente);
        header("location: index.php");
    }
?>