<?php 
 include "conn/connect.php";
$lista = $conn ->query("select * from vw_tbprodutos where produtos_geral = 'sim' ");
$row_geral = $lista->fetch_assoc();
$num_linhas = $linha->num_rows;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos Geral</title>
</head>
<body>
    <h2 class="breadcrumb alert-danger"><strong></strong>

    </h2>
    
</body>
</html>
