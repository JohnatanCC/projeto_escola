<!DOCTYPE html>
<html lang="pt_br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Estoque | Registro</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../dist/css/style.css">
</head>
<body class="hold-transition register-bg register-page">
<div class="register-box">
  <div class="card card-outline card-red">
    <div class="card-header text-center">

    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
  <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
</svg>
      <h1><b>Cadastrar</b></h1>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Criar nova conta</p>

      <form action="" method="post" enctype="multipart/form-data">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Nome Completo" name="nome" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="E-mail" name="email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Senha" name="senha" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="termos" value="agree" required>
              <label for="agreeTerms">
               Estou de acordo com os <a href="#">termos de uso</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn bg-default btn-block text-light" name="cadUser">Criar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
      <a href="../index.php" class="text-center">Já tem uma conta? Entrar</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<?php
                include_once('../config/conexao.php');
                if(isset($_POST['cadUser'])){
                  $nome = $_POST['nome'];
                  $email = $_POST['email'];
                  $senha = base64_encode(md5($_POST['senha']));


                  $cadastro = "INSERT INTO estoque_user (nome_user,email_user,senha_user) VALUES (:nome,:email,:senha)";

                  try{
                    //Preparar a conecção para fazer o insert
                    $result = $conect ->prepare($cadastro);
                    $result->bindParam(':nome',$nome,PDO::PARAM_STR);
                    $result->bindParam(':senha',$senha,PDO::PARAM_STR);
                    $result->bindParam(':email',$email,PDO::PARAM_STR);
                    $result->execute();
                    //Resultado do cadrastro
                    $contar = $result->rowCount();
                    if ($contar>0) {
                      echo '<div class="alert alert-success" role="alert"><strong>Cadastro realizado com sucesso!!!</strong> Faça login para continuar :)</div>';
                    }else{
                      echo '<div class="alert alert-warning" role="alert">Erro ao cadastrar... :(</div>';
                    }

                  } catch (PDOExeption $e) {
                    echo '<strong>ERRO DE CADASTRO = </strong>'.$e->getMessage();
                  }

                }
              ?>

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
