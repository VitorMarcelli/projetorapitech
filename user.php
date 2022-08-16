<?php

// Inicialize a sessão
session_start();

// // Verifique se o usuário já está logado
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){

if ($nivel['nivel'] == '0') 
header("Location: user.php"); 
else header("Location: login.php");

exit;
}


// Incluir arquivo de configuração
require_once "bd/config.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/icon.ico">
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/userstyle.css">

    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <style>

    </style>

    <title>Página do Usuário</title>
</head>

<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="img/user.png" alt="">
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
                        <a href="user.php">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Home</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="ordemuser.php">
                            <i class='bx bx-bar-chart-alt-2 icon'></i>
                            <span class="text nav-text">Ordem de Serviços</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="reset-password.php">
                            <i class='bx bx-key icon'></i>
                            <span class="text nav-text">Redefinir senha</span>
                        </a>
                    </li>

                    <!-- <li class="nav-link">
                        <a href="reset-password.php">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">Suas solicitações</span>
                        </a>
                    </li> -->
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

          <a href="ordemuser.php" style="text-decoration:none; color: black;">
        <div class="row">
            <div class="card green">
                <h2>Ordem de Serviço</h2>
                <p>Realize sua ordem de serviço aqui! </p>
            </div></a>

            <a href="reset-password.php" style="text-decoration:none; color: black;">
            <div class="card blue">
                <h2>Redefinir senha</h2>
                <p>Redefina sua senha aqui! </p>
            </div></a>

            <!-- <a href="soliciuser.php" style="text-decoration:none; color: black;">
            <div class="card red">
                <h2>Suas solicitações</h2>
                <p>Acompanhe as suas solicitações aqui! </p>
            </div></a> -->
            
        </div>

    </section>

    <script src="js/script.js"></script>

</body>

</html>