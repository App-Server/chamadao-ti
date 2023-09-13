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
        
        .form-control{
            width:550px;
            height: 30px;
            
        }

        .btn-enviarchamado{
            background-color: green;
            color: white;
            border-radius: 8px;
            border-color: green;
            width: 150px;
            height: 40px;
            font-size: 18px;
            cursor: pointer;
        }
        
    </style>
</head>
<body>
        
    <button id="showPopupBtn" class="btn-abrirchamado">Abrir Chamado</button>
    
    <div id="popup" class="popup">
        <div class="popup-content">
        <span class="close" id="closePopupBtn">&times;</span>
        
            <!-- <form action="cadastrar-ocorrencia.php" method="post"> -->
               
            <form action="cadastrar-ocorrencia.php" method="post">
                <label for="prioridade">Qual a prioridade?</label>
                <br>
                <select id="prioridade" name="prioridade" class="form-control"  required>
                    <option value=""></option>
                    <option value="alta">Alta Prioridade</option>
                    <option value="media">Média Prioridade</option>
                    <option value="baixa">Baixa Prioridade</option>
                </select>
                <br>
                <br>
                <label for="nome_parceiro">Nome do Parceiro</label>
                <br>
                <input type="text" id="nome_parceiro" name="nome_parceiro" class="form-control"  required>
                <br>
                <br>
                <label for="setor">Seu Setor</label>
                <br>
                <select id="setor" name="setor" class="form-control"  required>
                    <option value=""></option>
                    <option value="time1">Time 1</option>
                    <option value="time2/4">Time 2/4</option>
                    <option value="time3">Time 3</option>
                    <!-- Adicione outras opções conforme necessário -->
                </select>
                <br>
                <br>
                <label for="local_problema">Onde está o problema?</label>
                <br>
                <select id="local_problema" name="local_problema" class="form-control"  required>
                    <option value=""></option>
                    <option value="smbot">SM Bot</option>
                    <option value="shopify">Shopify</option>
                    <option value="criativos">Criativos</option>
                    <!-- Adicione outras opções conforme necessário -->
                </select>
                <br>
                <br>
                <label for="data_ocorrencia">Data da Ocorrência</label>
                <br>
                <input type="date" id="data_ocorrencia" name="data_ocorrencia" class="form-control"  required>
                <br>
                <br>
                <label for="descricao">Descreva a Ocorrência</label>
                <br>               
                <textarea id="descricao" name="descricao" rows="10" cols="66"  required></textarea>
                <br>
                <br>
                <button type="submit" class="btn-enviarchamado">Enviar</button>
            </form>
                <!-- <div class="form-chamadov1">
                <div class="prioridade" name="prioridade" >Qual a prioridade?</div>
                <select name="prioridade" class="form-control" required>
                    <option value=""></option>
                        <option value="">Alta Prioridade</option>
                        <option value="criativos">Media Prioridade</option>
                        <option value="criativos">Baixa Prioridade</option>
                    </select>
                    <br>
                    <br>
                <div class="titulo-form" name="nome_parceiro" >Nome do Parceiro</div>    
                    <input type="text"  name="nome_parceiro" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    <br>
                    <br>
                    <div class="titulo-form" name="setor">Seu Setor?</div>
                    <select name="setor" class="form-control" required>
                        <option value=""></option>
                        <option value="time1">Time 1</option>
                        <option value="time2/4">Time 2/4</option>
                        <option value="Time3">Time 3</option>
                        <option value="Time4">Time 4</option>
                        <option value="Time5">Time 5</option>
                        <option value="Time6">Time 6</option>
                        <option value="Financeiro">Financeiro</option>
                        <option value="CS">CS</option>
                        <option value="RH">RH</option>
                        <option value="Liderança">Liderança</option>
                        <option value="Diretoria">Diretoria</option>
                    </select>
                    <br>
                    <br>
                    <div class="titulo-form"  name="local_problema" >Onde esta o problema?</div>
                    <select id="" name="local_problema" class="form-control" required>
                        <option value=""></option>
                        <option value="smbot">SM bot</option>
                        <option value="shopify">Shopify</option>
                        <option value="criativos">Criativos</option>
                        <option value="Yampi">Yampi</option>
                        <option value="Sellflux">Sellflux</option>
                        <option value="Pagina-de-venda">Pagina de Venda</option>
                        <option value="Link-de-venda">Link de Venda</option>
                        <option value="Plataforma-de-curso">Plataforma de Curso</option>
                        <option value="Relatorios">Relatorios</option>
                        <option value="Relatorios">Equipamento</option>
                        <option value="Relatorios">Energia</option>
                        <option value="duvidas">Duvidas sobre software</option>
                    </select>
                    <br>
                    <br>
                    <div class="titulo-form" name="data_ocorrencia"  class="form-control" required>Data da Ocorrência</div>

                    <input type="date"  name="data_ocorrencia" class="form-control">
                    <br>
                    <br>
                    <div class="titulo-form">Descreva a Ocorrência</div>
                    <textarea  rows="10" cols="66" placeholder="Caso a ocorrência seja no SM bot coloque o protocolo de atendimento" type="text" id="descricao" name="descricao" maxlength="1000" ></textarea>
                    <br>
                    <br>
                    <button type="submit" class="btn-enviarchamado">Enviar</button>
            </div>
            </form> -->
        </div>
    </div>    
  
    <table class="container-table">
         <thead>
            <th>Ticket</th>
            <th>Nome Parceiro LDO</th>
            <th>Seu Setor</th>
            <th>Onde esta o problema</th>
            <th>Data do acorrência</th>
            <th>Prioridade</th>
            <th>Anexo</th>
        </thead>
        <tbody>
            <tr>
                <td data-label="id">1</td>
                <td data-label="Nome">Ana Letycia</td>
                <td data-label="Email">Time 2/4</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>
            </tr>

            <tr>
                <td data-label="id">2</td>
                <td data-label="Nome">Ana Letycia</td>
                <td data-label="Email">Time 2/4</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>            
            </tr>

            <tr>
                <td data-label="id">3</td>
                <td data-label="Nome">Lucas Santos</td>
                <td data-label="Email">Time 2/4</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                     
            </tr>

            <tr>
                <td data-label="id">4</td>
                <td data-label="Nome">Thiago Mendes</td>
                <td data-label="Email">Time 1</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                
            </tr>

            <tr>
                <td data-label="id">5</td>
                <td data-label="Nome">Lucas Santos</td>
                <td data-label="Email">Time 2/4</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                
            </tr>

            <tr>
                <td data-label="id">6</td>
                <td data-label="Nome">Felipe Lopes</td>
                <td data-label="Email">Time 1</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                
            </tr>

            <tr>
                <td data-label="id">7</td>
                <td data-label="Nome">Samuel Freire</td>
                <td data-label="Email">CS</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                
            </tr>

            <tr>
                <td data-label="id">8</td>
                <td data-label="Nome">Nayra Giovanna</td>
                <td data-label="Email">Time 2/4</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                
            </tr>

            <tr>
                <td data-label="id">9</td>
                <td data-label="Nome">Luana Telles</td>
                <td data-label="Email">Time 2/4</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                
            </tr>
            <tr>
                <td data-label="id">1</td>
                <td data-label="Nome">Ana Letycia</td>
                <td data-label="Email">Time 2/4</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>
            </tr>

            <tr>
                <td data-label="id">2</td>
                <td data-label="Nome">Ana Letycia</td>
                <td data-label="Email">Time 2/4</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>            
            </tr>

            <tr>
                <td data-label="id">3</td>
                <td data-label="Nome">Lucas Santos</td>
                <td data-label="Email">Time 2/4</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                     
            </tr>

            <tr>
                <td data-label="id">4</td>
                <td data-label="Nome">Thiago Mendes</td>
                <td data-label="Email">Time 1</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                
            </tr>

            <tr>
                <td data-label="id">5</td>
                <td data-label="Nome">Lucas Santos</td>
                <td data-label="Email">Time 2/4</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                
            </tr>

            <tr>
                <td data-label="id">6</td>
                <td data-label="Nome">Felipe Lopes</td>
                <td data-label="Email">Time 1</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                
            </tr>

            <tr>
                <td data-label="id">7</td>
                <td data-label="Nome">Samuel Freire</td>
                <td data-label="Email">CS</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                
            </tr>

            <tr>
                <td data-label="id">8</td>
                <td data-label="Nome">Nayra Giovanna</td>
                <td data-label="Email">Time 2/4</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                
            </tr>

            <tr>
                <td data-label="id">9</td>
                <td data-label="Nome">Luana Telles</td>
                <td data-label="Email">Time 2/4</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                
            </tr>
            <tr>
                <td data-label="id">1</td>
                <td data-label="Nome">Ana Letycia</td>
                <td data-label="Email">Time 2/4</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>
            </tr>

            <tr>
                <td data-label="id">2</td>
                <td data-label="Nome">Ana Letycia</td>
                <td data-label="Email">Time 2/4</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>            
            </tr>

            <tr>
                <td data-label="id">3</td>
                <td data-label="Nome">Lucas Santos</td>
                <td data-label="Email">Time 2/4</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                     
            </tr>

            <tr>
                <td data-label="id">4</td>
                <td data-label="Nome">Thiago Mendes</td>
                <td data-label="Email">Time 1</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                
            </tr>

            <tr>
                <td data-label="id">5</td>
                <td data-label="Nome">Lucas Santos</td>
                <td data-label="Email">Time 2/4</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                
            </tr>

            <tr>
                <td data-label="id">6</td>
                <td data-label="Nome">Felipe Lopes</td>
                <td data-label="Email">Time 1</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                
            </tr>

            <tr>
                <td data-label="id">7</td>
                <td data-label="Nome">Samuel Freire</td>
                <td data-label="Email">CS</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                
            </tr>

            <tr>
                <td data-label="id">8</td>
                <td data-label="Nome">Nayra Giovanna</td>
                <td data-label="Email">Time 2/4</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                
            </tr>

            <tr>
                <td data-label="id">9</td>
                <td data-label="Nome">Luana Telles</td>
                <td data-label="Email">Time 2/4</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                
            </tr>
            <tr>
                <td data-label="id">1</td>
                <td data-label="Nome">Ana Letycia</td>
                <td data-label="Email">Time 2/4</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>
            </tr>

            <tr>
                <td data-label="id">2</td>
                <td data-label="Nome">Ana Letycia</td>
                <td data-label="Email">Time 2/4</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>            
            </tr>

            <tr>
                <td data-label="id">3</td>
                <td data-label="Nome">Lucas Santos</td>
                <td data-label="Email">Time 2/4</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                     
            </tr>

            <tr>
                <td data-label="id">4</td>
                <td data-label="Nome">Thiago Mendes</td>
                <td data-label="Email">Time 1</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                
            </tr>

            <tr>
                <td data-label="id">5</td>
                <td data-label="Nome">Lucas Santos</td>
                <td data-label="Email">Time 2/4</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                
            </tr>

            <tr>
                <td data-label="id">6</td>
                <td data-label="Nome">Felipe Lopes</td>
                <td data-label="Email">Time 1</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                
            </tr>

            <tr>
                <td data-label="id">7</td>
                <td data-label="Nome">Samuel Freire</td>
                <td data-label="Email">CS</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                
            </tr>

            <tr>
                <td data-label="id">8</td>
                <td data-label="Nome">Nayra Giovanna</td>
                <td data-label="Email">Time 2/4</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                
            </tr>

            <tr>
                <td data-label="id">9</td>
                <td data-label="Nome">Luana Telles</td>
                <td data-label="Email">Time 2/4</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                
            </tr>
            <tr>
                <td data-label="id">1</td>
                <td data-label="Nome">Ana Letycia</td>
                <td data-label="Email">Time 2/4</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>
            </tr>

            <tr>
                <td data-label="id">2</td>
                <td data-label="Nome">Ana Letycia</td>
                <td data-label="Email">Time 2/4</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>            
            </tr>

            <tr>
                <td data-label="id">3</td>
                <td data-label="Nome">Lucas Santos</td>
                <td data-label="Email">Time 2/4</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                     
            </tr>

            <tr>
                <td data-label="id">4</td>
                <td data-label="Nome">Thiago Mendes</td>
                <td data-label="Email">Time 1</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                
            </tr>

            <tr>
                <td data-label="id">5</td>
                <td data-label="Nome">Lucas Santos</td>
                <td data-label="Email">Time 2/4</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                
            </tr>

            <tr>
                <td data-label="id">6</td>
                <td data-label="Nome">Felipe Lopes</td>
                <td data-label="Email">Time 1</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                
            </tr>

            <tr>
                <td data-label="id">7</td>
                <td data-label="Nome">Samuel Freire</td>
                <td data-label="Email">CS</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                
            </tr>

            <tr>
                <td data-label="id">8</td>
                <td data-label="Nome">Nayra Giovanna</td>
                <td data-label="Email">Time 2/4</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                
            </tr>

            <tr>
                <td data-label="id">9</td>
                <td data-label="Nome">Luana Telles</td>
                <td data-label="Email">Time 2/4</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                
            </tr>
            <tr>
                <td data-label="id">1</td>
                <td data-label="Nome">Ana Letycia</td>
                <td data-label="Email">Time 2/4</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>
            </tr>

            <tr>
                <td data-label="id">2</td>
                <td data-label="Nome">Ana Letycia</td>
                <td data-label="Email">Time 2/4</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>            
            </tr>

            <tr>
                <td data-label="id">3</td>
                <td data-label="Nome">Lucas Santos</td>
                <td data-label="Email">Time 2/4</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                     
            </tr>

            <tr>
                <td data-label="id">4</td>
                <td data-label="Nome">Thiago Mendes</td>
                <td data-label="Email">Time 1</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                
            </tr>

            <tr>
                <td data-label="id">5</td>
                <td data-label="Nome">Lucas Santos</td>
                <td data-label="Email">Time 2/4</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                
            </tr>

            <tr>
                <td data-label="id">6</td>
                <td data-label="Nome">Felipe Lopes</td>
                <td data-label="Email">Time 1</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                
            </tr>

            <tr>
                <td data-label="id">7</td>
                <td data-label="Nome">Samuel Freire</td>
                <td data-label="Email">CS</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                
            </tr>

            <tr>
                <td data-label="id">8</td>
                <td data-label="Nome">Nayra Giovanna</td>
                <td data-label="Email">Time 2/4</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                
            </tr>

            <tr>
                <td data-label="id">9</td>
                <td data-label="Nome">Luana Telles</td>
                <td data-label="Email">Time 2/4</td>
                <td data-label="Onde esta o problema">SM bot</td>
                <td data-label="Data do acorrência">30/07/2023</td>
                <td data-label="urgente">Urgente</td>
                <td data-label="forms"><button>Ver Forms</button></td>                
            </tr>
        </tbody>
    </table>
    <script>
         // Get references to the popup and buttons
         const popup = document.getElementById('popup');
        const showPopupBtn = document.getElementById('showPopupBtn');
        const closePopupBtn = document.getElementById('closePopupBtn');

        // Event listeners to show and hide the popup
        showPopupBtn.addEventListener('click', () => {
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