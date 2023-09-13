<?php

    session_start();
    include 'sidebar.php';
    include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Chamados</title>
    <style>
        body {
            margin: 0px;
            padding: 0px;
        }

        * {
            box-sizing: border-box;
        }

        img {
            width: 18px;
            cursor: pointer;
        }

        .container-table {
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;
            width: 60vw;
            margin-top: 100px;
        }

        .container-table td, .container-table th {
            padding: 5px 8px;
            border: 1px solid #ddd;
            text-align: center;
            font-size: 16px;
        }

        .container-table th {
            background-color: darkblue;
            color: #fff;
        }

        .container-table tbody tr:nth-child(even) {
            background-color: #eeeeee;
        }

        /* Responsive */

        @media (max-width: 767px) {
            .container-table thead {
                display: none;
            }

            .container-table, .container-table tbody, .container-table tr, .container-table td {
                display: block;
                width: 100%;
            }

            .container-table tr {
                margin-bottom: 15px;
            }

            .container-table td {
                text-align: right;
                padding-left: 50%;
                text-align: right;
                position: relative;
            }

            .container-table td::before {
                content: attr(data-label);
                position: absolute;
                left: 0px;
                width: 50%;
                padding-left: 15px;
                font-size: 15px;
                font-size: 15px;
                font-weight: bold;
                text-align: left;
            }

        }
        /* pop up */

        /* Create a container to hold the sidebar and main content */
        .container {
            display: flex;
            position: relative;
        }

        /* Style for the sidebar */
        .sidebar {
            width: 250px;
            background-color: #002966;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            overflow-y: auto;
            transition: transform 0.3s;
            z-index: 2;
        }

        .profile img {
            width: 100px;
            border-radius: 50%;
        }

        .menu {
            list-style: none;
            padding: 0;
        }

        .menu li {
            margin-bottom: 10px;
        }

        h2 {
            color: white;
        }

        .menu a {
            text-decoration: none;
            color: #ffffff;
            font-size: 18px;
            display: block;
        }

        /* Style for the main content */
        .content {
            flex: 1;
            background-color: #ffffff;
            padding: 20px;
            margin-left: 250px; /* Keep the sidebar initially visible */
        }

        /* Hamburger button style */
        .hamburger-button {
            display: none;
            position: absolute;
            top: 10px;
            left: 10px;
            cursor: pointer;
            color: #333;
            font-size: 24px;
            z-index: 3;
        }

        /* Responsive styles */
        @media screen and (max-width: 768px) {
            .sidebar {
                transform: translateX(-250px); /* Hide the sidebar on mobile by default */
            }

            .hamburger-button {
                display: block;
            }

            .container.open .sidebar {
                transform: translateX(0); /* Show the sidebar on mobile when the button is clicked */
            }

            .container.open .content {
                margin-left: 0;
            }
        }


        /* div main */

        /* Styling for the popup container */
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.7);
            z-index: 1;
            
        }
        
        /* Styling for the popup content */
        .popup-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            position: relative;
            
        }
        
        /* Styling for the close button */
        .close {
            color: #aaaaaa;
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
          
        }

        /* btn-abrichamado */
        
        .btn-abrirchamado{
            margin-left:380px;
            background-color: green;
            color: white;
            border-radius: 8px;
            border-color: green;
            width: 180px;
            height: 40px;
            font-size: 18px;
            cursor: pointer;
        }
        
        .btn-arquivausuario{
            background-color: red;
            color: white;
            border-radius: 8px;
            border-color: red;
            width: 70px;
            height: 25px;
            font-size: 14px;
            cursor: pointer;
        }
        
        .btn-cadastrausuario{
            margin-left:110px;
            background-color: green;
            color: white;
            border-radius: 8px;
            border-color: green;
            width: 180px;
            height: 40px;
            font-size: 18px;
            cursor: pointer;
        }

        .btn-enviarusuario{
            background-color: green;
            color: white;
            border-radius: 8px;
            border-color: green;
            width: 150px;
            height: 40px;
            font-size: 18px;
            cursor: pointer;
        }

        .form-control{
            width:550px;
            height: 30px;
           
        }
    </style>
</head>
<body>
    
    <div class="content">
            <!-- Main content here --> 
            <button id="showCadastraUsuario" class="btn-cadastrausuario">Cadastra Usuarios</button>    
            <div id="popup" class="popup">
                <div class="popup-content">
                  <span class="close" id="closePopupBtn">&times;</span>
                  <div class="text" class="form-control">Cadastro de Usuário</div>
                  <br>
                  <form action="cadastrar-usuario.php" method="post">
                    <label for="nomeParceiro">Nome:</label>
                    <br>
                    <input type="text" name="nomeParceiro" class="form-control" required>
                    <br>
                    <br>
                    <label for="setor">Setor:</label>
                    <br>
                    <input type="text" name="setor" class="form-control" required>
                    <br>
                    <br>
                    <label for="email">Email:</label>
                    <br>
                    <input type="email" name="email" class="form-control" required>
                    <br>
                    <br>
                    <label for="senha">Senha:</label>
                    <br>
                    <input type="password" name="senha" class="form-control" required>
                    <br>
                    <br>
                    <br>
                    <input type="submit" value="Cadastrar" class="btn-enviarusuario">
                  </form>
                </div>
              </div>

        </div>
        <button class="hamburger-button">&#9776;</button>
        <table class="container-table">
         <thead>
            <th>ID</th>
            <th>Nome Parceiro LDO</th>
            <th>Setor</th>
            <th>email</th>            
            <th>Arquivar</th>
        </thead>
        <tbody>
            <tr>
                <td data-label="id">1</td>
                <td data-label="Nome">Aragao</td>
                <td data-label="Email">TI</td>
                <td data-label="Onde esta o problema">aragao@lojadedropshipping.com.br</td>
                <td data-label="forms"><button class="btn-arquivausuario">Arquivar</button></td>
            </tr>

            <tr>
                <td data-label="id">2</td>
                <td data-label="Nome">Francisco</td>
                <td data-label="Email">TI</td>
                <td data-label="Onde esta o problema">francisco.pires@lojadedropshipping.com.br</td>
                <td data-label="forms"><button class="btn-arquivausuario">Arquivar</button></td>        
            </tr>

            <tr>
                <td data-label="id">3</td>
                <td data-label="Nome">Luís</td>
                <td data-label="Email">Diretoria</td>
                <td data-label="Onde esta o problema">luis@lojadedropshipping.com.br</td>
                <td data-label="forms"><button class="btn-arquivausuario">Arquivar</button></td>                     
            </tr>
            </tbody>
        </table>
    </div>
    <script>
        // Get references to the popup and buttons
        const popup = document.getElementById('popup');
        const showCadastraUsuario = document.getElementById('showCadastraUsuario');
        const closePopupBtn = document.getElementById('closePopupBtn');

        // Event listeners to show and hide the popup
        showCadastraUsuario.addEventListener('click', () => {
        popup.style.display = 'block';
        });

        closePopupBtn.addEventListener('click', () => {
        popup.style.display = 'none';
        });

        // Close the popup if the user clicks outside of it
        window.addEventListener('click', (event) => {
        if (event.target === popup) {
            popup.style.display = 'none';
        }
        });

    </script>    
</body>
</html>