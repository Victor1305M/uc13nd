<?php
// Incluindo o Sistema de autenticação
include("acesso_com.php");

// Incluir o arquivo e fazer a conexão
include("../conn/connect.php");

if($_POST){

        // Guardo o nome da imagem no banco e o arquivo no diretório
    if(isset($_POST['enviar'])){
        $nome_img   =   $_FILES['imagem_produto']['name'];
        $tmp_img    =   $_FILES['imagem_produto']['tmp_name'];
        $dir_img    =   "../images/".$nome_img;
        move_uploaded_file($tmp_img,$dir_img);
    };

    // Receber os dados do formulário
    // Organizar os campos na mesma ordem
    $id_tipo   =   $_POST['id_tipo'];
    $sigla_tipo = $_POST['id_tipo'];
    $rotulo_tipo = $_POST ['id_tipo'];
  

    // Consulta SQL para inserção de dados
    $insertSQL  =   "INSERT INTO tbtipos
                        (id_tipo_produto, destaque_produto, descri_produto, resumo_produto, valor_produto, imagem_produto)
                    VALUES
                        ('$id_tipo','$sigla_tipo','$rotulo_tipo')
                    ";
    $resultado  =   $conn->query($insertSQL);

    // Após a ação a página será redirecionada
    if(mysqli_insert_id($conn)){
        header("Location: tipos_lista.php");
    }else{
        header("Location: tipos_lista.php");
    };
};

// Selecionar os dados da chave estrangeira
$consulta_fk    =   "SELECT * FROM tbtipos  ORDER BY rotulo_tipo ASC ";
$lista_fk       =   $conn->query($consulta_fk);
$row_fk         =   $lista_fk->fetch_assoc();
$totalRows_fk   =   ($lista_fk)->num_rows;

?>
<!-- html:5 -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Produtos - Insere</title>
    <meta charset="UTF-8">
    <!-- Link arquivos Bootstrap CSS -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="../css/estilo.css" type="text/css">
</head>
<body class="fundofixo">
<?php include "menu_adm.php"; ?>
<main class="container">
    <div class="row"><!-- Abre row -->
        <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4"><!-- Dimensionamento -->
            <h2 class="breadcrumb text-danger">
                <a href="tipos_lista.php">
                    <button class="btn btn-danger">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </button>
                </a>
                Inserindo Tipos
            </h2>
            <!-- Abre thumbnail -->
            <div class="thumbnail">
                <div class="alert alert-danger" role="alert">
                    <form action="tipos_insere.php" id="form_tipos_insere" name="form_tipos_insere" method="post" enctype="multipart/form-data">
                        <!-- Select id_tipo_produto -->
                        <label for="id_tipo_produto">Tipo:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                            </span>
                            <!-- select>option*2 -->
                            <select name="id_tipo_produto" id="id_tipo_produto" class="form-control" required>
                                <!-- Abre estrutura de repetição -->
                                <?php do { ?>
                                <option value="<?php echo $row_fk['id_tipo']; ?>">
                                    <?php echo $row_fk['rotulo_tipo']; ?>
                                </option>
                                <?php } while($row_fk = $lista_fk->fetch_assoc()); 
                                $rows_fk = mysqli_num_rows($lista_fk);
                                if($rows_fk > 0){
                                    mysqli_data_seek($lista_fk,0);
                                    $rows_fk = $lista_fk->fetch_assoc();
                                };
                                ?>
                                <!-- Fecha estrutura de repetição -->
                            </select>
                        </div><!-- fecha input-group -->
                        <br>
            
                        </div><!-- fecha input-group -->
                        <br>
                        <!-- Fecha radio destaque_produto -->

                        <!-- text descri_produto -->
                        <label for="descri_produto">Sigla:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="" aria-hidden="true"></span>
                            </span>
                            <input type="text" name="sigla_produto" id="sigla_produto" class="form-control" placeholder="Digite a sigla do tipo" maxlength="100" required>
                        </div><!-- fecha input-group -->
                        <br>
                        <!-- Fecha text descri_produto -->

                        <!-- textarea resumo_produto -->
                        <label for="resumo_produto">Rotulo:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon" aria-hidden="true"></span>
                            </span>
                            <textarea name="rotulo_produto" id="rotulo_produto" cols="30" rows="2" placeholder="Digite o rotulo do tipo" class="form-control"></textarea>
                        </div><!-- fecha input-group -->
                        <br>
                        <!-- Fecha textarea resumo_produto -->

                        <!-- number valor_produto -->
                        <
                        <br>
                    
                        <!-- btn enviar -->
                        <input type="submit" value="Cadastrar" name="enviar" id="enviar" class="btn btn-danger btn-block">
                    </form>
                </div><!-- Fecha alert -->
            </div><!-- Fecha thumbnail -->
        </div><!-- Fecha Dimensionamento -->
    </div><!-- Fecha row -->
</main>


</script>

<!-- Link arquivos Bootstrap js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>