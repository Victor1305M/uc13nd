<?php 
include "conn/connect.php";
$idtipo = $_GET['id_tipo'];
$listaPorTipo = $conn->query("select * from vw_tbprodutos where id_tipo_produto = $idTipo;");
$rowPorTipo = $listaPorTipo->fetch_assoc();
$numrows = $listaPorTipo->num_rows;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Document</title>
</head>
<body class="fundofixo">
<?php   include  "menu_publico.php" ?> 

<!--Mostrar os registro se a consulta   RETORNAR Vazio-->
<?php  if($numrows==0){ ?>
<h2 class="breadcrumb alert-danger">
    <a href="javascript;window.history.go(-1)" class="btn btn-danger">
    <span class="glyphicon_chevron-left"></span>        
</a>
    Não há produtos cadastrados deste tipo
</h2>
    <?php };?>
<!--Mostrar os registro se a consulta Não retornar Vazio-->
<?php  if($numrows> 0){?>
    <h2 class="breadcrumb alert-danger">
    <a href="javascript;window.history.go(-1)" class="btn btn-danger">
    <span class="glyphicon_chevron-left"></span> 
    </a>
    <strong><?php
      echo $rowPorTipo['rotulo_tipo'];
      ?></strong> 
    </h2>
    <div class="row">
        <?php  do{?>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <a href="produto_detalhe.php?id_produto=<?php echo $rowPorTipo['id_produto']; ?>">
                    <img 
                    src="images/<?php echo $rowPorTipo['imagem_produto']; ?>" 
                    class="img_responsive img-roudend"
                    slyle="height:20em;">

                    </a>
                    <div class="caption text-right">
                        <h3 class="text-danger">
                            <strong><?php echo $rowPorTipo['descri_produto'];?></strong>
                        </h3>
                        <p class="text-warning">
                        <strong><?php echo $rowPorTipo['rotulo_produto'];?></strong>
                        </p>
                        <p class="text-left">
                        <?php echo mb_strwidth($rowPorTipo['resumo_produto'],0,42,'...'); ?>
                        </p>

                </div>
            </div>

            <?php } while ($rowPorTipo = $listaPorTipo->fetch_assoc());?>
    </div>


    <?php }?>




<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <a href="produto_detalhe.php&id_produto=<?php ?>"> </a>
    </div>
</div>


<footer>
    <?php  include "rodape.php"?>
</footer>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js%22%3E</script>
<script src="js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="./slick/slick.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    $(document).on('ready', function() {
        $(".regular").slick({
            dots: true,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3
        });
    });
</script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</html>