<?php
session_start();

// // Verifique se o usuário já está logado.
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {

    exit;
}
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
                        <a href="soliciuser.php">
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
        <H2>Solicitação de OS</H2>
        <?php
        $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        

        if(!empty($data['SendAddMsg'])){

            $query_dados = "INSERT INTO ordemserv (usuario, problema, prioridade, empresa, obs, created) VALUE (:usuario, :problema, :prioridade, :empresa, :obs, NOW())";
            $add_dados = $pdo->prepare($query_dados);

            $add_dados->bindParam(':usuario', $data['usuario'], PDO::PARAM_STR);
            $add_dados->bindParam(':problema', $data['problema'], PDO::PARAM_STR);
            $add_dados->bindParam(':prioridade', $data['prioridade'], PDO::PARAM_STR);
            $add_dados->bindParam(':empresa', $data['empresa'], PDO::PARAM_STR);
            $add_dados->bindParam(':obs', $data['obs'], PDO::PARAM_STR);

            
            $add_dados->execute();

            
            
            if($add_dados->rowCount()){
                echo"Dados de OS enviada com sucesso!<br>";
            }else{
                echo"ERRO: dados de OS nao enviada com sucesso";
            }
        }
        ?>
        <form name="add_msg" action="" method="POST">
            <div>
            <label>Usuario: </label>
            <input type="text" name="usuario" id="name" readonly="readonly" placeholder="Nome de Usuario" value="<?php echo htmlspecialchars($_SESSION["username"]);?>" autofocus required><br>

            <label>Problema: </label>
            <input type="text" name="problema" id="name" placeholder="O problema" value="<?php
            if (isset($data['problema'])) {
                echo $data['problema'];
            }
            ?>" autofocus required><br>


            <label for="prioridade">Prioridade: </label>
            <select id="prioridade" name="prioridade" >
                <option value="Alta">Baixa</option>
                <option value="Media">Media</option>
                <option value="Baixa">Alta</option>
            </select><br>


            <label>Empresa: </label>
            <input type="text" name="empresa" id="name" placeholder="Sua Empresa" value="<?php
            if (isset($data['empresa'])) {
                echo $data['empresa'];
            }
            ?>" autofocus required><br>


            <label>Obs: </label><br>
            <textarea name="obs" id="obs" rows="4" cols="50" placeholder="Detalhes sobre a solicitação"></textarea>
            <input type="hidden" value="<?php
            if (isset($data['obs'])) {
                echo $data['obs'];
            }
            ?>" autofocus required><br>

            <input type="submit" value="Enviar" name="SendAddMsg" href="user.php">
            </div>
        </form>
    </section>




    <script src="js/script.js"></script>

</body>

</html>