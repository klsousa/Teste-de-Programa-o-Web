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
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if (!empty($dados['CadHorario'])) {
            /* var_dump($dados); */
        $dados['data_cadastro'] = date('Y-m-d');
    
            $query_horario = "INSERT INTO horarios (entrada, saida, data_cadastro) VALUES (:entrada, :saida, :data_cadastro)";
            $cd_horario = $conn->prepare($query_horario);
            $cd_horario->bindParam(':entrada', $dados['entrada']);
            $cd_horario->bindParam(':saida', $dados['saida']);
            $cd_horario->bindParam(':data_cadastro', $dados['data_cadastro']);
    
            $cd_horario->execute();
    
            if ($cd_horario->rowCount()) {
                echo "<span style='color:green;'>Horário cadastrado com sucesso!</span><br>";
            } else {
                echo "<span style='color:red;'>Erro: Horário não cadastrado!</span><br>";
            }
        }
?>