<?php
  ob_start();
  session_start();
  if ((isset($_SESSION['loginEmail'])) && (isset($_SESSION['loginSenha']))){
    header("Location: pag/home.php?acao=principal ");
    exit;
  }
?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sitema de Estoque | Entrar</title>

  <link rel="shortcut icon" href="../imagens/icon.png" type="image/x-icon">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/css/style.css">
</head>
<body class="hold-transition register-bg login-page">
<div class="login-box">

  <div class="card card-outline card-red">
    <div class="card-header text-center">


<svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
</svg>

      <b><h1>Login</h1><b>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Faça login para iniciar sua sessão</p>

      <form action="#" method="post" enctype="multipart/form-data">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="E-mail" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Senha" name="senha">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn text-light bg-default btn-block" name="LOGIN" >Entrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!--PHP-->
      <?php
        include_once('config/conexao.php');
        //acesso restrito
        if(isset($_GET['acao'])){
          $acao=$_GET['acao'];
          if ($acao == "restrito") {
            echo '<div style="margin: top 10px;" class="alert alert-danger"><strong>Faça login com e-mail e senha: </strong>Acesso restrito a usuários cadastrados!!!</div>';
            header("Refresh: 2, index.php ");
          }elseif($acao == "sair") {
            echo '<div style="margin: top 10px;" class="alert alert-primary text-bold"><strong>Você saiu do Sistema de Estoque</div>';
            header("Refresh: 2, index.php ");
          }

         }
        if(isset($_POST['LOGIN'])){
           $login = filter_input(INPUT_POST,'email', FILTER_DEFAULT);
           $senha = base64_encode(md5(filter_input(INPUT_POST,'senha', FILTER_DEFAULT)));
          
           $select = "SELECT * FROM estoque_user WHERE email_user=:emailLogin AND senha_user=:senhaLogin";
        try{
           $result = $conect->prepare($select);
           $result->bindParam(':emailLogin',$login, PDO::PARAM_STR);
           $result->bindParam(':senhaLogin',$senha, PDO::PARAM_STR);
           $result->execute();
 
           $verificar = $result->rowCount();
        if($verificar>0){
          $_SESSION['loginEmail'] = $login;
          $_SESSION['loginSenha'] = $senha;

          echo '<div style="margin: top 10px;" class="alert alert-success" role="alert"><strong>Logado com sucesso!!! :)</strong>  Você será redirecionado em breve...</div>';
          header("Refresh: 3, pag/home.php?acao=principal ");
         }else{
           echo '<div style="margin: top 10px;" class="alert alert-danger"><strong>Erro!</strong> email ou senha incorretos, digite outro email ou faça o cadastro em "Não tem uma conta? Crie uma!"</div>';
         }
       } catch(PDOException $e){
         echo "<strong>ERRO DE PDO = </strong>".$e->getMessage();
       }
     }
      ?>


   
      <p class="mb-0">
        <a href="Registro/registro.php" class="text-center">Não tem uma conta? Crie uma!</a>
      </p>
    </div>

  </div>

</div>


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>