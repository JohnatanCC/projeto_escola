<?php
ob_start();
session_start();
if(!isset($_SESSION['loginEmail']) && (!isset($_SESSION['loginSenha']))){
  header("Location: ../index.php?acao=restrito");
  exit;
}
include_once('../includes/sair.php');
?>

<!DOCTYPE html>
<html lang="pt_br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">





  <title>Sistema de Estoque</title>

  <link rel="shortcut icon" href="../imagens/icon.png" type="image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->

  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">




  
  <link rel="stylesheet" href="../dist/css/style.css">
</head>
<body class="hold-transition text-bold  sidebar-mini layout-fixed">

 <style>

    .sidebar-default{
      background:#DC3545;
      background-size:cover;
      border-right:4px solid #9b1d29;
      overflow:hidden;
    }

    .text-light {
      color:#FFF !important ;
      text-transform:uppercase;
    }

    .text-bold {
      font-weight: bold;

    }

    body {
      background-image:url("../imagens/register-bg.jpg");
      background-position:top;
      background-size:cover;
  
    }

    .icon {
      padding:3px;
      background:#FFF;
      border: 2px solid #EEE;
      border-radius:5px;
      margin-right:5px;
      width:40px;
      height:40px;
      box-shadow: 2px 2px 0px 2px #762238;
    }

    .icon-area:hover {
      background: #ac2b2b;
     border-radius:5px;
     transition:all ease .4s
    }

    .icon-area {
      border-radius:5px
    }

    a {
      text-decoration:none;
    }

    .d-centered {
      text-align:center;
      align-items:center;
    
      display:flex;
    }

    .atualizacao {
      display:flex;
      width:100%;
      height:100%;
      position:fixed;
      z-index: 9999;
      background: #fffffff5;
      background: #efeaeaf5;
      transform:scale(0);
      transition:all ease .4s;
      justify-content:center;
      align-items:center
      
    }

    .table {
      text-align:center;
    }


  
  </style>

  <div class="atualizacao">

    <div class="container">

    

    <div class="alert alert-warning" role="alert">
  O sistema não está em sua versão final, o que significa que pode conter bugs e funcionalidades ainda não implementadas. Por favor, aguarde por atualizações!
</div>
 

    <h1 class="text-primary mb-4 mt-4">Planejamento de atualizações</h1>
    <div class="accordion " id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
       Atualização:Beta 1.1 |<strong>Nova Função de adição ou remoção Automática.</strong> | Data:??/07/2023
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>Uma nova ação irá ser adicionado no catálago!</strong> Agora você poderá salvar seus alimentos e definir quantidades específicas para cada um. Ao clicar no botão "Adicionar tudo", as quantidades previamente salvas nos alimentos serão automaticamente adicionadas ou removidas do seu estoque.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Atualização:Beta 1.2 |<strong>Correção de bugs.</strong> | Data:??/07/2023
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>O código será revisado minuciosamente para solucionar todos os bugs identificados.</strong> Foram identificados alguns bugs durante o desenvolvimento e, após a revisão, todos os problemas registrados serão corrigidos para garantir a conclusão do sistema.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Atualização: Beta 1.3 |<strong>Otimização do código</strong> | Data:??/08/2023
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>Uma Otimização do código será feita.</strong>A otimização de código é importante para melhorar o desempenho, a eficiência, a manutenibilidade, a escalabilidade e economizar recursos, proporcionando uma melhor experiência para os usuários finais.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
        Atualização: Final 1.4 |<strong>Responsividade</strong> | Data:??/08/2023
      </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>O sistema será finalmente reponsivel!</strong>um sistema responsivo é fundamental para oferecer uma experiência de usuário consistente e agradável em diferentes dispositivos, além de melhorar a acessibilidade, o alcance e o engajamento.
      </div>
    </div>
  </div>
</div>

<div class="btn btn-danger mt-4" id="close">

    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
</svg>


    </div>
    </div>

    </div>

<div class="wrapper">

  <!-- Preloader -->
  <div  class="preloader anim-preload flex-column justify-content-center align-items-center" style="background:#FFF!important">
    <img class="" src="../imagens/cooking.gif" alt="AdminLTELogo" >
  </div>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-default elevation-4 text-light" >
    <!-- Brand Logo -->
    <a href="#" class="">
      <img src="../imagens/logo_atualizada.png" alt="AdminLTE Logo" class="brand-image" style="width:210px;margin:20px;">
    </a>
    <?php
      include_once('../config/conexao.php');
      $usuarioLogado = $_SESSION['loginEmail'];
      $senhaDoUsuario = $_SESSION['loginSenha'];

      $selectUser = "SELECT * FROM estoque_user WHERE email_user=:emailUserLogado AND senha_user=:senhaUserLogado";

      try {
        $resultadoUser = $conect->prepare($selectUser);
        $resultadoUser->bindParam(':emailUserLogado', $usuarioLogado, PDO::PARAM_STR);
        $resultadoUser->bindParam(':senhaUserLogado', $senhaDoUsuario, PDO::PARAM_STR);
        $resultadoUser->execute();

        $contar = $resultadoUser->rowCount();
        if($contar > 0){
          while($show = $resultadoUser->FETCH(PDO::FETCH_OBJ)){
            $id_user = $show->id_user;
          
            $nome_user = $show->nome_user;
            $email_user = $show->email_user;
   
            $senha_user = $show->senha_user;
          }
        }else{
          echo '<div class="alert alert-danger"> <strong>Aviso!</strong> Não há dados com de perfil :(</div>';
        }

      } catch (PDOException $e) {
        echo '<strong>ERRO DE PDO USER LOGIN = </strong>'.$e->getMessage();
      }
    ?>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
     
        <div class="info">
        <ul class="navbar-nav ml-auto">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav  nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        
        <li class="dropdown icon-area mb-2">
        <a class=" dropdown-toggle text-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">

        <svg xmlns="http://www.w3.org/2000/svg" fill="red" class="bi bi-person-fill icon" viewBox="0 0 16 16">
         <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
        </svg>

        <?php echo $nome_user; ?>
    </a>
        <ul class="dropdown-menu">
          <li><a href="home.php?acao=perfil" class="dropdown-item  dropdown-item" href="#">Perfil</a></li>
          <li><a class="dropdown-item" href="?sair" >Sair</a></li>
        </ul>

    </li>

    <li class=" icon-area mb-2 pr-2">
        <a href="home.php?acao=principal" class=" text-light" type="button">

        <svg xmlns="http://www.w3.org/2000/svg" fill="red" class="bi bi-cart-check-fill icon" viewBox="0 0 16 16">
                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708z"/>
            </svg>
          Adicionar Itens
    </a>
       

    </li>

    <li class="icon-area mb-2 pr-2">
  <a id="open" class="text-light" type="button">
    <svg xmlns="http://www.w3.org/2000/svg" fill="red" class="bi bi-journal-bookmark-fill icon" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8V1z"/>
      <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
      <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
    </svg>
    Atualizações
  </a>
       

    </li>

    <hr>

    <div class="dropdown-divider"></div>

    <li class=" icon-area mb-2 pr-2">
        <a href="home.php?acao=relatorio" class=" text-light" type="button" >

        <svg xmlns="http://www.w3.org/2000/svg" fill="green" class="bi icon bi-box-seam-fill" viewBox="0 0 16 16">
               <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.01-.003.268-.108a.75.75 0 0 1 .558 0l.269.108.01.003 6.97 2.789ZM10.404 2 4.25 4.461 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339L8 5.961 5.596 5l6.154-2.461L10.404 2Z"/>
            </svg>
         Itens no estoque
    </a>


    </li>

    <li class=" icon-area mb-2 pr-2">
        <a href="home.php?acao=relatorio2" class=" text-light" type="button" >

        <svg xmlns="http://www.w3.org/2000/svg" fill="#e8d430" class="bi icon bi-box-seam-fill" viewBox="0 0 16 16">
               <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.01-.003.268-.108a.75.75 0 0 1 .558 0l.269.108.01.003 6.97 2.789ZM10.404 2 4.25 4.461 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339L8 5.961 5.596 5l6.154-2.461L10.404 2Z"/>
            </svg>
         Itens acabando
    </a>

    <li class=" icon-area mb-2 pr-2">
        <a href="home.php?acao=relatorio3" class=" text-light" type="button" >

        <svg xmlns="http://www.w3.org/2000/svg" fill="red" class="bi icon bi-box-seam-fill" viewBox="0 0 16 16">
               <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.01-.003.268-.108a.75.75 0 0 1 .558 0l.269.108.01.003 6.97 2.789ZM10.404 2 4.25 4.461 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339L8 5.961 5.596 5l6.154-2.461L10.404 2Z"/>
            </svg>
         Itens faltando
    </a>


    </li>


    </li>

    
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <script>
  let atualizacao = document.querySelector(".atualizacao");

  document.querySelector('#open').addEventListener('click', () => {
    atualizacao.style.transform = "scale(1)";
  });

  document.querySelector('#close').addEventListener('click', () => {
    atualizacao.style.transform = "scale(0)";
  });
</script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>