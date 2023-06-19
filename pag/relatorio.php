  
  <style>

td {
    font-size:18px  
  }

  </style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">
            <!-- (Relatório com datatable) -->

            <div class="col-12">
            <div class="card">
              <div class="card-header bg-green">
                <h3 class="card-title">Itens no estoque</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Adicionar/remover</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php
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
                header("Location: home.php?acao=relatorio");
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
                  header("Location: home.php?acao=relatorio");
                  exit();
                } else {
                  // A quantidade a ser removida é maior do que o estoque atual, trate esse caso de acordo com o requisito do sistema
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
                    <td><?php echo $cont++; ?></td>
                    <td><img src="../img/avatar/<?php echo $show->image_alimento; ?>" style="width:100px; border-radius:5px; margin-top: 10px"></td>
                    <td><?php echo $show->nome_alimento; ?></td>
                    <td><?php echo $show->qtd_alimento; ?></td>
                   
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
                  </tr>


                  <?php
                      }
                    }else{
                      echo '<div class="alert  text-center mb-2  alert-warning" role="alert"><sytrong>Ainda não há alimentos adicionados!<strong></div>';
                    }

                  }catch (PDOExeption $e) {
                    echo '<strong>ERRO DE LEITURA = </strong>'.$e->getMessage();
                  }
                    ?>
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
            
            <!-- FIM(Relatório com datatable) -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>