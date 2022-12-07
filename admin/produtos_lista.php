<?php 
include "acesso_com.php";
include "../conn/connect.php";
$lista = $conn->query("select * from vw_tbprodutos"); // order by (tipo, destaque, etc.) 
$row = $lista->fetch_assoc(); 
$nrows = $lista->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Lista</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body class="fundofixo">
    <?php  include "menu_adm.php"; ?>
    <main class="container">
        <h2 class="breadcrumb alert-danger">Lista de Produtos</h2>
        <table class="table table-hover table-condensed tb-opacidade">
            <thead>
                <th class="hidden">ID</th>
                <th>TIPO</th>
                <th>DESCRIÇÃO</th>
                <th>RESUMO</th>
                <th>VALOR</th>
                <th>IMAGEM</th>
                <th>
                    <a href="produtos_insere.php" target="_self" class="btn btn-block btn-primary btn-xs" role="button">
                        <span class="hidden-xs">ADICIONAR</span>
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                </th>
            </thead>
             <tbody>
                 <?php  do {?>
                    <tr>
                      <td class="hidden"><?php echo $row['id_produto']; ?></td>
                      <td>
                        <span class="visible-xs"><?php  echo $row['sigla_tipo']?></span>
                        <span class="hidden-xs"><?php  echo $row['rotulo_tipo']?></span>
                      </td>  
                      <td>
                        
                        <?php 
                            if ($row['destaque_produto']=='Sim'){
                              echo  '<span class="glyphicon glyphicon-heart text-danger" aria-hidden="true"></span>';       
                         
                            }else {
                                echo  '<span class="glyphicon glyphicon-ok text-info" aria-hidden="true"></span>';
                            }
                        ?>
                        <?php echo $row['descri_produto']?>
                      </td> 
                      <td>
                      <?php echo $row['resumo_produto']?>
                      </td>
                      <td>
                        <?php echo number_format($row['valor_produto'],2,',','.') ;?>
                      </td>
                      <td>  
                         <img src="../images/<?php echo $row['imagem_produto']?>" alt=" <?php echo $row['descri_produto']?>" width="100px">           
                      </td>
                      <td>
                        <a href="produtos-atualiza.php?id_produto=<?php echo base64_encode( $row['id_produto']); ?>"  role="button" class="btn btn-waring btn-block btn-xs">
                            <span class="hidden-xs">ALTERAR</span>
                            <span class="glyphicon glyphicon-refresh"></span>
                        </a>
                        <button data-name="<?php echo $row['id_produto']?>" 
                        data-id="<?php echo $row['id_produto']; ?>"
                        class="delete btn btn-xs btn-block btn-danger"
                        >
                            <span>Excluir</span>
                            <span class="glyphicon glyphicon-trash"></span>
                        </button>
                      </td>
                    </tr>
                    <?php } while($row = $lista->fetch_assoc());?><!--final estrutura de-->   
            </tbody><!-- final corpo da tabela-->
        </table>
    </main>
    <!--inic.io do modal para excluir-->
    <div class="modal fade" id="modalEdit" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                     <button class="close" data-dismiss="modal" type="button">
                            &times;
                     </button>       
                </div>
                <div class="modal-body">
                    Deseja mesmo excluir o item?
                    <h4><span class="nome"></span></h4>

                </div>
                <div class="modal-footer">
                    <a href="#" type="button" class="btn btn-danger deletes-yes">
                            Confirmar
                    </a>
                    <button class="btn btn-sucess" data-adismiss="modal">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript">
    $('.delete').on('click',function(){
        var nome = $(this).data('nome'); //busca o nome com a descrição (data-nome)
        var id = $(this).data('id'); // busca o id (data-id)
        //console.log(id + ' - ' + nome); //exibe no console
        $('span.nome').text(nome); // insere o nome do item na confirmação
        $('a.delete-yes').attr('href','produtos_excluir.php?id_produto='+id); //chama o arquivo php para excluir o produto
        $('#modalEdit').modal('show'); // chamar o modal
    });
</script>

</html>