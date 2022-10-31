<?php 
    
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "registrohorarios";
        
        try{
        $conn = new PDO("mysql:hots=$servername;dbname=" .$dbname, $username, $password);

        /* echo "Conexão com banco de dados realizado com sucesso."; */
        } catch (PDOException $erro){
            echo "Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado" .$erro->getMessage();
 
        }
?>