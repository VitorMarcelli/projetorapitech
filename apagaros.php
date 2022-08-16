<?php

// Inicialize a sessão
session_start();
ob_start();

// Verifique se o usuário já está logado
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {

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


    <title>Dashboard Sidebar Menu</title>
    <style>
        table,
        th,
        td {
            margin: 0;
            padding: 0;
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
    <H2>Apagar Os</H2>
        <?php

        $row_os = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
        var_dump($row_os);

        if (empty($row_os)) {
            $_SESSION['msg'] = "<p style='color: #f00;'>Erro: usuario não encontrado!</p>";
            header("location: ordensadm.php");
        }

        $query_os = "SELECT id FROM ordemserv WHERE id = $row_os LIMIT 1";
        $result_os = $pdo->prepare($query_os);
        $result_os->execute();

        if (($result_os) and ($result_os->rowCount() != 0)) {
            $query_del_os = "DELETE FROM ordemserv WHERE id = $row_os";
            $apagar_os = $pdo->prepare($query_del_os);

            if ($apagar_os->execute()) {
                $_SESSION['msg'] = "<p style='color: green;'>Usuario apagado com sucesso</p>";
                header("location: ordensadm.php");
            } else {
                $_SESSION['msg'] = "<p style='color: #f00;'>não foi possivel apagar o usuario</p>";
                header("location: ordensadm.php");
            }
        } else {
            $_SESSION['msg'] = "<p style='color: #f00;'>Erro: usuario não encontrado!</p>";
            header("location: ordensadm.php");
        }
        ?>

    </section>

    <script src="js/script.js"></script>

</body>

</html>