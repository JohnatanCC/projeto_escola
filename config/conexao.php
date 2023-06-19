<?php

    try{
        //códigos de execução
        DEFINE('HOST','localhost');
        DEFINE('BD','sistema_estoque');
        DEFINE('USER','root');
        DEFINE('PASS','root');
    
        $conect = new PDO('mysql:host='.HOST.';dbname='.BD,USER,PASS);
        $conect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (PDOExeption $e) {
        echo '<strong>ERRO DE PDO = </strong>'.$e->getMessage();
    }