<?php 
include "conn/connect.php";
$lista_tipos = $conn->query('select * from tbtipos order by rotulo_tipo');
$rot_tipos = $lista_tipos->fetch_all();
// $rot_tipos = $lista_tipos->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link para CSS bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Menu público</title>
</head>

<body>
    <!-- abre a barra de navegação  -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <!-- Agrupamento mobile  -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-publico" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.php" class="navbar navbar-brand">
                    <img src="logo-fruitzip.png" alt="logotipo fruitzip">
                </a>
            </div>
            <!-- fecha Agrupamento mobile -->
            <!-- Nav direita -->
            <div class="collapse navbar-collapse" id="menu-publico">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <a href="index.php">
                            <span class="glyphicon glyphicon-home"></span>
                        </a>
                    </li>
                    <li><a href="index.php#destaques">DESTAQUES</a></li>
                    <li><a href="index.php#produtos">PRODUTOS</a></li>
                    <!-- fim dropdown -->
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            TIPOS
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <?php foreach($rows_tipos as $row) {?>
                                <li><a href="produtos_por_tipo.php?id_tipo=<?php echo $row[0]; ?>"><?php echo $row[2]; ?></a></li>
                            <?php }?>
                        </ul>
                    </li>
                    <!-- fim dropdown -->
                    <li><a href="index.php#contato">CONTATO</a></li>
                    <!-- inicio formulario de busca -->
                    <form action="produtos_busca.php" method="get" name="form-busca" id="form-busca" 
                                class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="search" name="buscar" id="buscar" size="9" class="form-control" aria-label="search" placeholder="Buscar produto" required>
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- final formulário de busca -->
                    <li class="active">
                    <li><a href="admin/index.php">
                        <span class="glyphicon glyphicon-user">&nbsp;ADMIN</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Fim Nav direita -->
        </div>
    </nav>
</body>

</html>