
<style>

  .card-body .btn {
    cursor:normal;
  }

  .style input {
    box-shadow: 2px 2px 0px 2px #aeaeae !important;
  }

  td {
    font-size:18px  
  }

</style>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper register-bg " style="background-position:bottom;background-size:cover">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Cadastro e Leitura de contatos -->
      <div class="row">

        <!-- Coluna I -->
        <div class="col-lg-4">
          <div class="card style  card-red">
            <div class="card-header">
              <h3 class="card-title">Adicionar Alimentos</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form action="" method="POST" enctype="multipart/form-data">
              <!-- POST: mais seguro, lento
                   GET: mais rápido, não seguro(mostra os dados na URL) -->
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nome</label>
                  <input type="text" class="form-control" maxlength="20" id="nome" name="nome"
                    title="Digite apenas letras" placeholder="Digite o nome do alimento." required>

                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Imagem</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile" name="foto" required>
                      <label class="custom-file-label" for="exampleInputFile">Upload da imagem</label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Quantidade</label>
                  <input required class="form-control" maxlength="3" type="text" pattern="[0-9]+" inputmode="numeric"
                    name="quantidade" onchange="atualizarQuantidade(this.value)"
                     placeholder="Digite apenas números inteiros">

                </div>
              </div>


              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" name="cadContato" class="btn btn-danger text-light btn-shadow">Adicionar</button>
              </div>
            </form>

          </div>
        </div>

        <!-- Coluna II -->
        <div class="col-lg-8">
          <div class="card">
            <div class="card-header bg-red">
              <h3 class="card-title text-light">Catálogo</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Ações</th>
                    <th>Adicionar/Remover</th>
                    <th>Quantidade</th> <!-- Novo campo adicionado -->
                  </tr>
                </thead>
                <tbody>
                  <form action="" method="post">
                    <?php

            include_once('../config/conexao.php');

            

            if (isset($_POST['cadContato'])) {
              $nome = $_POST['nome'];

              // Upload da imagem
              if (!empty($_FILES['foto']['name'])) {
                // Tratamento da extensão da imagem de upload
                $formtP = array("png", "jpg", "jpeg", "gif");
                $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

                if (in_array($extensao, $formtP)) {
                  // Diretório para upload da imagem do contato
                  $pasta = "../img/avatar/";
                  // Endereço temporário da imagem
                  $temporario = $_FILES['foto']['tmp_name'];
                  // Definir um novo nome para a imagem
                  $novoNome = uniqid() . ".{$extensao}";

                  if (move_uploaded_file($temporario, $pasta . $novoNome)) {

                  } else {
                    $mensagem = "Erro, não foi possível fazer o upload do arquivo :(";
                  }
                } else {
                  echo "Arquivo inválido :(";
                }
              } else {
                $novoNome = "user.jpg";
              }

              $cadastro = "INSERT INTO estoque_alimento (nome_alimento,image_alimento,qtd_alimento) VALUES (:nome,:foto,:qtd)";

              try {
                // Preparar a conexão para fazer o insert
                $result = $conect->prepare($cadastro);
                $result->bindParam(':nome', $nome, PDO::PARAM_STR);
                $result->bindParam(':qtd', $_POST['quantidade'], PDO::PARAM_STR);
                $result->bindParam(':foto', $novoNome, PDO::PARAM_STR);
                $result->execute();
                // Resultado do cadastro
                $contar = $result->rowCount();
                if ($contar > 0) {
                  echo '<div class="alert alert-success" role="alert">Alimento adicionado no catálogo</div>';
                  header("home.php?acao=principal ");
                } else {
                  echo '<div class="alert alert-warning" role="alert">Não é possível adicionar</div>';
                }
              } catch (PDOException $e) {
                echo '<strong>ERRO DE CADASTRO = </strong>' . $e->getMessage();
              }
            }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['addQuantidade'])) {
      
      // Ação de adicionar quantidade
      $idAlimentoAdd = $_POST['idAdd'];
      $quantidadeAdd = $_POST['quantidadeAdd'];

      // Consultar o estoque atual do alimento no banco de dados
      $select = "SELECT qtd_alimento FROM estoque_alimento WHERE id_alimento = :id";
      $stmt = $conect->prepare($select);
      $stmt->bindParam(':id', $idAlimentoAdd);
      $stmt->execute();
      $estoqueAtual = $stmt->fetchColumn();

      // Calcular a nova quantidade no estoque
      $novaQuantidade = $estoqueAtual + $quantidadeAdd;

      // Atualizar a quantidade do estoque no banco de dados
      $update = "UPDATE estoque_alimento SET qtd_alimento = :quantidade WHERE id_alimento = :id";
      $stmt = $conect->prepare($update);
      $stmt->bindParam(':quantidade', $novaQuantidade);
      $stmt->bindParam(':id', $idAlimentoAdd);
      $stmt->execute();

      // Redirecionar ou atualizar a página
      header("Location: home.php?acao=principal");
      exit();
    } elseif (isset($_POST['remQuantidade'])) {
      // Ação de remover quantidade
      $idAlimentoRemove = $_POST['idRemove'];
      $quantidadeRemove = $_POST['quantidadeRemove'];

      // Consultar o estoque atual do alimento no banco de dados
      $select = "SELECT qtd_alimento FROM estoque_alimento WHERE id_alimento = :id";
      $stmt = $conect->prepare($select);  
      $stmt->bindParam(':id', $idAlimentoRemove);
      $stmt->execute();
      $estoqueAtual = $stmt->fetchColumn();

      // Verificar se a quantidade a ser removida não ultrapassa o estoque atual
      if ($quantidadeRemove <= $estoqueAtual) {
        // Calcular a nova quantidade no estoque
        $novaQuantidade = $estoqueAtual - $quantidadeRemove;

        // Atualizar a quantidade do estoque no banco de dados
        $update = "UPDATE estoque_alimento SET qtd_alimento = :quantidade WHERE id_alimento = :id";
        $stmt = $conect->prepare($update);
        $stmt->bindParam(':quantidade', $novaQuantidade);
        $stmt->bindParam(':id', $idAlimentoRemove);
        $stmt->execute();

        // Redirecionar ou atualizar a página
        header("Location: home.php?acao=principal");
        exit();
      }
    }
  }

  include_once('../config/conexao.php');
  $select = "SELECT * FROM estoque_alimento ORDER BY id_alimento";

  try {
    $result = $conect->prepare($select);
    $cont = 1;
    $result->execute();

    $contar = $result->rowCount();
    if ($contar > 0) {
      while ($show = $result->FETCH(PDO::FETCH_OBJ)) {
  ?>
                    <tr>
                      <td>
                        <?php echo $cont++; ?>
                      </td>
                      <td><img src="../img/avatar/<?php echo $show->image_alimento; ?>"
                          style="width:100px; border-radius:5px; margin-top: 10px"></td>
                      <td>
                        <?php echo $show->nome_alimento; ?>
                      </td>
                      <td>
                        <a href="deletar.php?idDel=<?php echo $show->id_alimento; ?>"
                          onclick="return confirm('Você deseja apagar o alimento? Essa ação é irreversível.')"
                          class="btn btn-danger btn-shadow">
                          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                            class="bi bi-bag-x-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                              d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM6.854 8.146a.5.5 0 1 0-.708.708L7.293 10l-1.147 1.146a.5.5 0 0 0 .708.708L8 10.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 10l1.147-1.146a.5.5 0 0 0-.708-.708L8 9.293 6.854 8.146z" />
                          </svg>
                        </a>
                      </td>
                      <td>
                        <!-- Adiciona -->
                        <form action="" method="post">
                          <input type="hidden" name="idAdd" value="<?php echo $show->id_alimento; ?>">
                          <div class="btn-group  btn-shadow">
                            <button type="submit" name="addQuantidade" class="btn btn-success"
                              onclick="return confirm('Você realmente deseja adicionar essa quantidade?')">
                              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                  d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5V8z" />
                              </svg>
                            </button>
                            <input class="btn"  placeholder="Adicionar" style="border:2px solid green; color: green;width: 115px;"
                              type="number" name="quantidadeAdd" id="quantidadeAdd" min="1" max="999"  required>
                          </div>
                        </form>
                        <!-- Remove -->
                        <form action="" method="post">
                          <input type="hidden" name="idRemove" value="<?php echo $show->id_alimento; ?>">
                          <div class="btn-group mt-2 btn-shadow">
                            <button type="submit" name="remQuantidade" class="btn btn-danger"
                              onclick="return confirm('Você realmente deseja retirar essa quantidade?')">
                              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bag-dash-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM6 9.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1H6z"/>
                               </svg>
                            </button>
                            <input class="btn"  placeholder="Retirar" style="border:2px solid red; color: red;width: 115px;"
                              type="number" name="quantidadeRemove" id="quantidadeRemove" min="1" max="999" required>
                          </div>
                        </form>
                      </td>





                      <td>
                     <?php echo $show->qtd_alimento; ?>
                      </td>
                    </tr>
          <?php
              }
            } else {
              echo '<div class="alert  text-center mt-2 alert-warning" role="alert"><sytrong>Ainda não há alimentos adicionados!<strong></div>';
            }
          } catch (PDOException $e) {
            echo "<div class='alert alert-danger' role='alert'>Erro: " . $e->getMessage() . "</div>";
          }

          ?>
                   
            </form>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>

      </div>
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>