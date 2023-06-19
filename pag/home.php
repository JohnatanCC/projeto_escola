<?php
/* include trás outros arquivos php para dentro da página include();*/
/* include_once inclue o arquivo apenas uma vez */
include_once('../includes/header.php');

// Criação da linkagem por parâmetro
if (isset($_GET['acao'])) {
    $acao = $_GET['acao'];

    if ($acao == 'principal') {
        include_once('principal.php');
    } elseif ($acao == 'relatorio') {
        include_once('relatorio.php');
    } elseif ($acao == 'relatorio2') {
        include_once('relatorio2.php');
    } elseif ($acao == 'relatorio3') {
        include_once('relatorio3.php');
    } elseif ($acao == 'perfil') {
        include_once('perfil.php');
    } elseif ($acao == 'editar') {
        include_once('editar.php');
    } else {
        include_once('erro.php');
    }
}

include_once('../includes/rodape.php');
