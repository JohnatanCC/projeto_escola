  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      <?php 
            include_once('../config/conexao.php');
            if(!isset($_GET['idUp'])){
              header("Location: home.php");
              exit;
            }
            $id = filter_input(INPUT_GET, 'idUp',FILTER_DEFAULT);
            $select = "SELECT * FROM estoque_alimento WHERE id_alimento=:id";

            try {
              $result=$conect->prepare($select);
              $result->bindParam(':id',$id,PDO::PARAM_INT);
              $result->execute();

            $contar = $result->rowCount();
              if($contar>0){
                while ($show = $result->FETCH(PDO::FETCH_OBJ)){
                  $id_contato=$show->id_contato;
                  $nome=$show->nome_contato;
             
                
                  $foto=$show->avatar_contato;
                }
              }else{
                echo '<div style="margin-top:10px" class="alert alert-warning" role="alert">Dados não encontrados... :(</div>';
              }


            } catch (PDOException $e) {
              echo '<strong>ERRO AO DELETAR</strong>'.$e->getMessage();
            }
          ?>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <!-- Coluna I -->
          <div class="col-lg-5">
            <div class="card card-red">
              <div class="card-header">
                <h3 class="card-title">Editando Contato...</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="POST" enctype="multipart/form-data">
                <!-- POST: mais seguro, lento
                     GET: mais rápido, não seguro(mostra os dados na URL) -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" name="nome" class="form-control" id="nome" value="<?php echo $nome; ?>">
                  </div>
         
                  
                  <div class="form-group">
                    <label for="exampleInputFile">Imagem</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="foto" class="custom-file-input" id="imagem">
                        <label class="custom-file-label" for="exampleInputFile">Upload da imagem</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-danger" name="updContato">Salvar</button>
                </div>
              </form>

              <!--php-->
              <?php
                include_once('../config/conexao.php');
                if(isset($_POST['updContato'])){
                  $nome = $_POST['nome'];
           
     
                  # $id = $_GET['idUp'];
                  //$foto = $_POST['foto'];

                  //Upload da imagem
                  if(!empty($_FILES['foto']['name'])){
                    //Tratamento da extensão da imagem de upload
                    $formtP = array("png","jpg","jpeg","gif");
                    $extensao = pathinfo($_FILES['foto']['name'],PATHINFO_EXTENSION);

                    if(in_array($extensao,$formtP)){
                      //Diretório para upload da imagem do contato
                      $pasta = "../img/avatar/";
                      //endereço temporário da imagem
                      $temporario = $_FILES['foto']['tmp_name'];
                      //Definir um novo nome para a imagem
                      $novoNome = uniqid().".{$extensao}";

                      if(move_uploaded_file($temporario,$pasta.$novoNome)){

                      }else{
                        $mensagem = "Erro, não foi possível fazer o upload do arquivo :(";
                      }

                    }else{
                      echo "Arquivo inválido :(";
                    }
                  }else{
                    $novoNome = "user.jpg";
                  }

                  $update = "UPDATE estoque_alimento SET nome_alimento=:nome,WHERE id_alimento=:id";

                  try{
                    //Preparar a conecção para fazer o insert
                    $result = $conect ->prepare($update);
                    $result->bindParam(':id',$id,PDO::PARAM_STR);
                    $result->bindParam(':nome',$nome,PDO::PARAM_STR);
                    $result->bindParam(':foto',$novoNome,PDO::PARAM_STR);
                    $result->execute();
                    //Resultado do cadrastro
                    $contar = $result->rowCount();
                    if ($contar>0) {
                      echo '<div class="alert alert-success" role="alert"><strong>Atualizado com sucesso!!! :) </strong>Atualize a página para visualizar</div>';
                    }else{
                      echo '<div class="alert alert-warning" role="alert">Erro ao atualizar... :(</div>';
                    }
                  } catch (PDOExeption $erro) {
                    echo '<strong>ERRO DE CADASTRO = </strong>'.$erro->getMessage();
                  }
                }
              ?>

            </div>
          </div>

          <!-- Coluna II -->
          <div class="col-lg-6">

            <div class="card card-red">
              <div class="card-header">
                <h3 class="card-title">Editando contato...</h3>
              </div>
              <div class="card-body p-0" style="text-align:center">
                <img src="../img/avatar/<?php echo $foto; ?>" style="width:300px; border-radius:10px; margin-top: 10px">
                <h2><?php echo $nome ?></h2>
     
              </div>
            </div>

        </div><!--Fecha coluna-->
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>