<?php
    
    include 'config.php';

    // Obter os dados do formulário
    $prioridade = $_POST["prioridade"];
    $nomeParceiro = $_POST["nome_parceiro"];
    $setor = $_POST["setor"];
    $localProblema = $_POST["local_problema"];
    $dataOcorrencia = $_POST["data_ocorrencia"];
    $descricao = $_POST["descricao"]; 

    // Inserir os dados na tabela
    $sql = "INSERT INTO lista_de_chamados (prioridade, nome_parceiro, setor, local_problema, data_ocorrencia, descricao)
            VALUES ('$prioridade', '$nomeParceiro', '$setor', '$localProblema', '$dataOcorrencia', '$descricao')";

    // if ($conn->query($sql) === TRUE) {
    //     echo "Erro ao cadastrar ocorrência: " . $conn->error;
    // } 

    $conn->close();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Dropshipping</title>
    <link rel="stylesheet" href="css/cadastrar-ocorrencia.css">
    
</head>
<body>
    <div class="cadastro-sucesso">✅ Chamado enviado com sucesso!   
        <a href="lista-de-chamados.php"><button class="btn">Ver lista de Chamados</button></a>
    </div>
</body>
</html>