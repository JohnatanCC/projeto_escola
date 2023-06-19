<?php

    include_once('../config/conexao.php');
    if(isset($_GET['idDel'])){
        $id = $_GET['idDel'];

        $select = "SELECT * FROM sistema_estoque WHERE id_alimento=:id";

        try {
           $result=$conect->prepare($select);
           $result->bindParam(':id',$id, PDO::PARAM_INT);
           $result->execute();

           $contar= $result->rowCount();
           if($contar>0){
                $loop = $result->fetchAll();
                foreach($loop as $exibir){

                }
                //Procurar e deletar a imagem
                $fotoDeleta = $exibir['image_alimento'];
                $arquivo = "../img/avatar/".$fotoDeleta;
                unlink($arquivo);

                $delete = "DELETE FROM sistema_estoque WHERE id_alimento=:id";

                try {
                    $result = $conect->prepare($delete);
                    $result->bindParam(':id',$id,PDO::PARAM_INT);
                    $result->execute();

                    $contar = $result->rowCount();
                    if($contar>0){
                    
                        header("Location:home.php?acao=relatorio");
                    }else{
                        header("Location:home.php?acao=relatorio");
                    }

                } catch (PDOException $e) {
                    echo '<strong>ERRO DE DELETE = </strong>'.$e->getMessage();
                }
                
           }else{
                header('Location: home.php');
           }
        } catch (PDOException $e) {
            echo '<strong>ERRO DE SELECT = </strong>'.$e->getMessage();
        }


    }