<?php

//início da sessão
session_start();

//carregamento das rotas permitidas
$rotasPermitidas = require_once __DIR__.'/../inc/rotas.php';

//definição da rota
$rota = $_GET['rota'] ?? 'home';

//verifica se o usuário está logado
if(!isset($_SESSION["usuario"])){
    $rota = "login";
}

//se o usuário está logado e tenta entrar na página login
if(isset($_SESSION["usuario"]) && $rota === "login"){
    $rota = "home";
}

if(!in_array($rota, $rotasPermitidas)){
    $rota = "404";
}

//preparação da página
$script = null;

switch($rota){
    case "404":
        $script = "404.php";
    break;
    case "home":
        $script = "home.php";
    break;
    case "login":
        $script = "login.php";
    break;
}

require_once __DIR__."/../inc/header.php";
require_once __DIR__."/../inc/".$script;
require_once __DIR__."/../inc/footer.php";