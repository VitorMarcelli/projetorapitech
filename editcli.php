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
        <H2>Editar Cliente</H2>
        <?php

        $row_cli = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

        if (empty($row_cli)) {
            $_SESSION['msg'] = "<p style='color: #f00;'>Erro: usuario não encontrado!</p>";
            header("location: clientes.php");
            exit();
        }

        $query_usuario = "SELECT id, username, nivel FROM users WHERE id = $row_cli LIMIT 1";
        $result_usuario = $pdo->prepare($query_usuario);
        $result_usuario->execute();

        if (($result_usuario) and ($result_usuario->rowCount() != 0)) {
            $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
        } else {
            if (empty($row_cli))
                $_SESSION['msg'] = "<p style='color: #f00;'>Erro: usuario não encontrado!</p>";
            header("location: clientes.php");
            exit();
        }

        ?>

        <?php

        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if (!empty($dados['EditUsuario'])) {
            $empty_input = false;
            $dados = array_map('trim', $dados);
            if (in_array("", $dados)) {
                $empty_input = true;
                echo "<p style='color: #f00;'>Erro: Necessario preencher todos campos!</p>";
            }
            if (!$empty_input) {
                $query_up_usuario = "UPDATE users SET username=:username, nivel=:nivel WHERE id=:id";
                $edit_usuario = $pdo->prepare($query_up_usuario);
                $edit_usuario->bindParam(':username', $dados['username'], PDO::PARAM_STR);
                $edit_usuario->bindParam(':nivel', $dados['nivel'], PDO::PARAM_STR);
                $edit_usuario->bindParam(':id', $row_cli, PDO::PARAM_INT);
                if ($edit_usuario->execute()) {
                    $_SESSION['msg'] = "<p style='color: green;'>Usuario editado com sucesso!</p>";
                    header("Location: clientes.php");
                } else {
                    echo "<p style='color: #f00;'>Erro: Usuario não editado com sucesso!</p>";
                }
            }
        }
        ?>

        <form id="edit-usuario" method="POST" action="">
            <label>Nome:</label>
            <input type="text" name="username" id="username" placeholder="username" value="<?php if (isset($dados['username'])) {echo $dados['username'];} elseif (isset($row_usuario['username'])) { echo $row_usuario['username'];} ?>" required><br><br>

            <label>Nivel:</label>
            <input type="text" name="nivel" id="number" placeholder="nivel" value="<?php if (isset($dados['nivel'])) {echo $dados['nivel'];} elseif (isset($row_usuario['nivel'])) {echo $row_usuario['nivel'];} ?>" required>

            <input type="submit" value="Salvar" name="EditUsuario">



        </form>
    </section>

    <script src="js/script.js"></script>

</body>

</html>