<?php 
include "acesso_com.php";
include "../conn/connect.php";
$lista = $conn->query("select * from vw_tbprodutos"); // order, destaque, etc.)
$row = $lista->fetch_assoc();
$nrows = $lista->num_rows;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIPOS</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/estilo.css">
</head>
<body class="fundofixo">
    <?php include "menu_adm.php"; ?>
    main
    
</body>
</html>