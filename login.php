<?php
// Inicialize a sessão
session_start();
//quebra a sessao quando acessa a pagina
unset($_SESSION["loggedin"]);


// Verifique se o usuário já está logado, em caso afirmativo, redirecione-o.
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true) {
    if ($nivel['nivel'] != '0')
        header("Location: pagddministract.php");
    else header("Location: user.php");

    exit;
}
// Incluir arquivo de configuração
require_once "bd/config.php";

// Defina variáveis e inicialize com valores vazios
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Processando dados do formulário quando o formulário é enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Verifique se o nome de usuário está vazio
    if (empty(trim($_POST["username"]))) {
        $username_err = "Por favor, insira o nome de usuário.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Verifique se a senha está vazia
    if (empty(trim($_POST["password"]))) {
        $password_err = "Por favor, insira sua senha.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validar credenciais
    if (empty($username_err) && empty($password_err)) {
        // Prepare uma declaração selecionada
        $sql = "SELECT id, username, nivel, password FROM users WHERE username = :username";

        if ($stmt = $pdo->prepare($sql)) {
            // Vincule as variáveis à instrução preparada como parâmetros
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);

            // Definir parâmetros
            $param_username = trim($_POST["username"]);

            // Tente executar a declaração preparada
            if ($stmt->execute()) {
                // Verifique se o nome de usuário existe, se sim, verifique a senha
                if ($stmt->rowCount() == 1) {
                    if ($row = $stmt->fetch()) {
                        $id = $row["id"];
                        $username = $row["username"];
                        $hashed_password = $row["password"];
                        $nivel = $row["nivel"];
                        if (password_verify($password, $hashed_password)) {
                            
                            // A senha está correta, então inicie uma nova sessão
                            session_start();

                            // Armazene dados em variáveis de sessão
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                        }
                        if ($nivel['nivel'] == '1')
                            header("Location: pagddministract.php");
                        else header("Location: user.php");
                    }
                } else {
                    // A senha não é válida, exibe uma mensagem de erro genérica
                    $login_err = "Nome de usuário ou senha inválidos.";
                }
            }
        } else {
            // O nome de usuário não existe, exibe uma mensagem de erro genérica
            $login_err = "Nome de usuário ou senha inválidos.";
        }
    } else {
        echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
    }

    // Fechar declaração
    unset($stmt);
    // Fechar conexão
    unset($pdo);
}



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="icon" src="img/key.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font: 14px sans-serif;
            background: #9CC4FA;
        }

        .wrapper {
            width: 360px;
            padding: 20px;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-group-toggle {
            margin-left: 10px;
            margin-top: 10px;
        }

        .img1 {
            width: 100px;
        }
    </style>
</head>

<body>
    <div class="btn-group-toggle" data-toggle="buttons">
        <a href="index.php" type="button" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Voltar!</a>
        </label>
    </div>

    
    <div class="wrapper">

        <h2 class="text-center"><img class="img1 w-50" src="img/logo09.png"><br><br>Login</h2>
        <p>Por favor, preencha os campos para fazer o login. <br><br>(Acesso somente para clientes)</p>

        <br>

        <?php
            if (!empty($login_err)) {
                echo '<div class="alert alert-danger">' . $login_err . '</div>';
            }
            ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group has-feedback">
                <label>Nome do usuário</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Entrar">
            </div>
            <!-- <p>Não tem uma conta? <a href="register.php">Inscreva-se agora</a>.</p> -->
        </form>
    </div>
</body>

</html>