<?php

// Inicialize a sessão
session_start();


// Verifique se o usuário já está logado, em caso afirmativo, redirecione-o
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){

    if ($nivel['nivel'] == '1') 
    header("Location: pagddministract.php"); 
    else header("Location: login.php");
    
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


    <title>Pagina do administrador</title>
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
        <div class="text">Seja Bem vindo "<?php echo htmlspecialchars($_SESSION["username"]); ?>" !! </div>

        <div class="row">
        <a href="clientes.php" style="text-decoration:none; color: black;">
            <div class="card green">
                <h2>Clientes
                </h2>
                <p>Listagem de Clientes</p>
                </a>
                <img class="image" src="img/clientes.png" alt="clientes" />
            </div>

            <a href="ordensadm.php" style="text-decoration:none; color: black;">
            <div class="card blue">
                <h2>Ordem de Serviços</h2>
                <p>Listagem de Ordem de Serviços </p>
                </a>
                <img class="image" src="img/service.png" alt="serviço" />
            </div>

            <a href="Registractionclients.php" style="text-decoration:none; color: black;">
            <div class="card red">
                <h2>Criar Usuario</h2>
                <p>Criação de Usuarios</p>
                </a>
                <img class="image" src="img/novou.png" alt="novo user" />
            </div>

        </div>

    </section>

    <script src="js/script.js"></script>

</body>

</html>