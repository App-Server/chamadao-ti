<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Loja de Dropshipping</title>
    <style>
            /* Reset some default styles */
        body, html {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        /* Create a container to hold the sidebar and main content */
        .container {
            display: flex;
            position: relative;
        }

        /* Style for the sidebar */
        .sidebar {
            width: 210px;
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
        
    </style>
</head>
<body>
    <div class="container">
        <nav class="sidebar">
            <div class="profile">
                <br>
                <h2>Painel TI</h2>
            </div>
            <ul class="menu"><br>
                <li><a href="dashboard.php" >Home</a></li><br>
                <li><a href="lista-de-chamados.php">Lista de Chamados</a></li><br>
                <li><a href="#">Em Atendimento</a></li><br>
                <li><a href="#">Chamados Arquivados</a></li><br>
                <li><a href="lista-de-usuarios.php">Lista de Usuarios</a></li><br>
                <li><a href="#">Relatorios</a></li><br>
                <li><a href="login.php">SAIR</a></li><br>
                
            </ul>
        </nav>
        <div class="content">
            <!-- Main content here -->
            <div class="painel"></div>
           
                </div>
              </div>  

              
              
              <!-- pop up -->
              <!-- <div id="popup" class="popup">
                <div class="popup-content">
                  <span class="close" id="closePopupBtn">&times;</span>
                  
                </div>
              </div>    -->

        </div>
        <button class="hamburger-button">&#9776;</button>
    </div>
    <script>
        const container = document.querySelector('.container');
        const hamburgerButton = document.querySelector('.hamburger-button');

        hamburgerButton.addEventListener('click', () => {
            container.classList.toggle('open');
        });
    </script>
</body>
</html>