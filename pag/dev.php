  <style>
    .accordion-button::after {
      background-color:#FFF;
      padding:5px;
      border-radius:5px;
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
        <!-- Cadastro e Leitura de contatos -->
        <div class="row">

          <!-- Coluna I -->
          

          <!-- Coluna II -->
          <div class="col-lg-12">

            <div class="card card-primary" style="margin:0">
              <div class="card-header">
                <h3 class="card-title">Visualização do planejamento do projeto</h3>
              </div>
              <div class="card-body container p-4 mt-4 mb-4 text-center p-0" >
             
    <div class="accordion " id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header ">
      <button class="accordion-button bg-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
      <img src="../imagens/icons/projeto.png" class="mr-2" width="40px" height="40px">
      <strong >O que é o projeto?</strong>
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse  collapse show" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      Um sistema de estoque é um conjunto de ferramentas, processos e procedimentos utilizados para gerenciar o estoque de uma empresa. Ele fornece recursos para acompanhar, controlar e organizar todos os itens ou produtos que a empresa possui em seu inventário.
    <br>O principal objetivo de um sistema de estoque é garantir que a empresa tenha os itens certos, na quantidade certa, no momento certo. Isso envolve o registro de todas as entradas e saídas de produtos, monitoramento dos níveis de estoque, rastreamento de movimentações, controle de validade, entre outras atividades.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed  bg-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
      <img src="../imagens/icons/navegador.png" class="mr-2" width="40px" height="40px">  
      <strong>Apresentando o layout da Aplicação</strong> 
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
    
      O design do sistema de estoque segue o modelo padrão, apresentando uma tela de login e cadastro, opções de menu no lado esquerdo e 5 telas disponíveis. Ao fazer login, a primeira tela exibida é a de adição de itens no estoque. Nessa tela, você pode registrar os itens que estarão presentes no estoque, fornecendo informações como nome, imagem e quantidade.
    <br>  
    </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed  bg-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
      <img src="../imagens/icons/estatíticas.png" class="mr-2" width="40px" height="40px">
      <strong>Estatísticas</strong>
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <img src="../imagens/fluxograma.jpg" width="450px">
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed  bg-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
      <img src="../imagens/icons/funcionalidades.png" class="mr-2" width="40px" height="40px">
      <strong>Apresentar o que cada membro da equipe fez</strong>
      </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      O <strong class="text-primary">Johnatan</strong> desempenhou o cargo de Full Stack, atuando tanto no design quanto na programação em geral.<br>
      <hr>
      A <strong class="text-purple">Jennifer</strong> foi uma auxiliadora do programador, contribuindo na parte lógica dos códigos e solução de problemas. Além disso, ela também organizou as tarefas da equipe.<br>
      <hr>
      A <strong class="text-warning">Julia</strong> foi responsável pelo suporte, realizando pesquisas de imagens e ícones, além de criar os slides do projeto.<br>
      <hr>
      Infelizmente, o <strong class="text-danger">Ruan</strong> deixou a equipe, porém acreditamos que ele teria um papel importante no desenvolvimento.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed  bg-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
      <img src="../imagens/icons/apresentação.png" class="mr-2" width="40px" height="40px">
      <strong>Apresentação do funcionamento da aplicação</strong>
      </button>
    </h2>
    <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      Na tela de adição de alimentos, ocorre a conexão para realizar a inserção dos dados no banco de dados. Nessa tela, você pode fornecer o nome, selecionar a imagem e indicar a quantidade do alimento, que será salvo no banco de dados. As informações são armazenadas na tabela "estoque_alimento" do banco de dados, contendo os campos nome_alimento, id_alimento, imagem_alimento e qtd_alimento.
    <br>
    </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed  bg-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
      <img src="../imagens/icons/final.png" class="mr-2" width="40px" height="40px">
      <strong>Final da apresentação</strong>
      </button>
    </h2>
    <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      Ficamos felizes por conseguir implementar todas as funcionalidades básicas do site e também adicionar recursos além do planejado. Embora o sistema ainda não esteja na sua versão final, continuaremos trabalhando para atualizá-lo e otimizar o código. Foi um desafio desenvolver um sistema funcional com um conhecimento limitado, mas somos gratos a todos que nos apoiaram quando mais precisamos. Agradecemos pela atenção.
      </div>
    </div>
  </div>

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