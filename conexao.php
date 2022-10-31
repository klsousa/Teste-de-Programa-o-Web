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

        $query_horarios = "SELECT id, entrada, saida, data_cadastro FROM horarios ORDER BY id DESC";
        $resu_horarios = $conn->prepare($query_horarios);
        $resu_horarios->execute();
    
        while ($row_horario = $resu_horarios->fetch(PDO::FETCH_ASSOC)) {
            extract($row_horario);
            echo "ID: $id <br>";
            echo "Data de cadastro: $data_cadastro <br>";
            echo "Horário de entrada: $entrada <br>";
            echo "Horário de saida: $saida <br>";
    
            
    
            $entrada = DateTime::createFromFormat('H:i:s', $entrada);
            $saida = DateTime::createFromFormat('H:i:s', $saida);
    
            $intervalo = $entrada->diff($saida);

            
    
    
            echo "período trabalhado:" . $intervalo->format('%H:%I:%S') . "<br>";
            echo "<hr>";
        }
?>