<?php 
 session_name('chulettaa');

 if(!isset($_SESSION)){
    session_start();
 }
 //segurança digital

 //verificar se o usuario esta logado na sessão
 if(!isset($_SESSION{'login_usuario'})){
    // Se não existir redirecionamos a sessão por segurança
    header('location: login.php');
    exit;

 }
 $nome_da_sessao = session_name();

 if(!isset($_SESSION['nome_da_sessao']) 
 OR ($_SESSION['nome_da_sessao']!=$nome_da_sessao)){
    session_destroy();
    header('location: login.php');
 }
    
 if(!isset($_SESSION['login_usuario'])){
    session_destroy();
    header('location: login.php');

 }
 ?>