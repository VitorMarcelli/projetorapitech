<?php

// Inicialize a sessão
session_start();

// Verifique se o usuário já está logado.
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    
    exit;
    }

// Incluir arquivo de configuração
require_once "bd/config.php";
?>

<!DOCTYPE html>
<html lang="pti-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/userstyle.css">

    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>


    <title>Ordem de servico dos clientes</title>
    <style>
        table,
        th,
        td {
            margin: 5px;
            padding: 15px;
            box-sizing: border-box;
            border: 1px solid black;
            border-collapse: collapse;


        }

        .content {
            display: flex;
            margin: auto;
        }

        .rTable {
            width: 500px;
            text-align: center;
        }

        @media screen and (max-width: 480px) {}

        @media only screen and (min-width: 1200px) {}

    </style>
</head>

<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="img/configadm.png" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name"><?php echo htmlspecialchars($_SESSION["username"]); ?></span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="pagddministract.php">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Home</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="clientes.php">
                            <i class='bx bx-bar-chart-alt-2 icon'></i>
                            <span class="text nav-text">Clientes</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="ordensadm.php">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">Ordem de Serviços</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="Registractionclients.php">
                            <i class='bx bx-pie-chart-alt icon'></i>
                            <span class="text nav-text">Criar Usuarios</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="logout.php">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>


            </div>
        </div>

    </nav>
    <section class="home">

    <div class="m-5">
            <table class="rTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>usuario</th>
                        <th>problema</th>
                        <th>prioridade</th>
                        <th>Empresa</th>
                        <th>Obs</th>
                        <th>Created</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result_orcli = "SELECT * FROM ordemserv ORDER BY id ASC";
                    $result_orcli = $pdo->prepare($result_orcli);
                    $result_orcli->execute();

                    while ($row_orcli = $result_orcli->fetch(PDO::FETCH_ASSOC)) {

                        echo "<tr>";
                        echo "<td>" . $row_orcli['id'] . "</td>";
                        echo "<td>" . $row_orcli['usuario'] . "</td>";
                        echo "<td>" . $row_orcli['problema'] . "</td>";
                        echo "<td>" . $row_orcli['prioridade'] . "</td>";
                        echo "<td>" . $row_orcli['empresa'] . "</td>";
                        echo "<td>" . $row_orcli['obs'] . "</td>";
                        echo "<td>" . $row_orcli['created'] . "</td>";

                         echo "<td> <a href='apagaros.php?id=$row_orcli[id]'>
                        <button>
                        <img src='img/excluir.png'>
                         </button>
                         </a> 
                         </td>";
                        echo "</tr>";
                    } 
                    ?>
                </tbody>

            </table>
        </div>



    </section>

    <script src="js/script.js"></script>

</body>

</html>