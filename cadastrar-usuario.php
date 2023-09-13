<?php 
    
    include 'config.php';
    
    $nomeParceiro = $_POST["nomeParceiro"];
    $setor = $_POST["setor"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Hash da senha para armazenamento seguro
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Inserir os dados na tabela
    $sql = "INSERT INTO usuarios (nomeParceiro, setor, email, senha) VALUES ('$nomeParceiro', '$setor', '$email', '$senha_hash' )";
    if ($conn->query($sql) === TRUE) {
        // echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }

    $conn->close();
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Dropshipping</title>

    <style>
        *{
            margin:0px;
            padding:0px;
            box-sizing: border-box;
        }

        .cadastro-sucesso{
            width: 100vw;
            height: 10vh;
            align-items: center;
            display: grid;
            justify-content: center;
            margin-top:300px;
            font-size:50px;
            text-align: center;
        }

        .btn{
            width:300px;
            height: 40px;
            font-size:20px;
            background-color: green;
            color: white;
            border-radius: 8px;
            border-color: green;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="cadastro-sucesso">✅ Usuario cadastrado com sucesso!   
        <a href="lista-de-usuarios.php"><button class="btn">Ver lista de Usuarios</button></a>
    </div>
</body>
</html>