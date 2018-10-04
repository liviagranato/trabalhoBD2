<!doctype html>
<html lang="en" class="fundo_login">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Cadastro</title>
</head>
<body class="fundo_login">
<?php include_once 'navbar_cadastro.php'?>

<div class="container">
    <div class="card2 card-container-cadastro">
        <h1 class="center">Cadastrar Usuários</h1>
        <br/>
        <p id="profile-name" class="profile-name-card"></p>
        <form class="form-signin" method="post" action="cadastro.php">
            <label for="select">Tipo de Usuário *</label>
            <select id="select" name="select" class="form-control">
                <option value="1">Administrador</option>
                <option value="2">Comum</option>
            </select>
            <span id="reauth-email" class="reauth-email"></span>
            <label for="inputEmail">Email *</label>
            <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email" required autofocus>
            <label for="inputPassword">Senha *</label>
            <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Senha" required>
            <label for="inputPasswordConfirm">Confirmar Senha *</label>
            <input type="password" id="inputPasswordConfirm" class="form-control" name="inputPasswordConfirm" placeholder="Confirmar Senha" required>

            <button class="btn-2 btn-lg btn-primary btn-block btn-signin" type="submit" value="registrar" name="registrar">Registrar</button>
        </form><!-- /form -->
    </div><!-- /card-container -->
</div>

<?php
include_once 'conexao.php';
$login_cookie = $_COOKIE['inputEmail'];
if(isset($login_cookie)){


    if (isset($_POST['registrar'])) {
        $tipo = $_POST['select'];
        $login = $_POST['inputEmail'];
        $senha = ($_POST['inputPassword']);
        $senha2 = $_POST['inputPasswordConfirm'];
        if ($senha === $senha2) {
            $query = "SELECT * FROM usuario where email='$login'";
            $resultado = $conn->query($query);
            if ($resultado->num_rows>0){
                echo "<script language='javascript' type='text/javascript'>alert('Email já cadastrado!');window.location.href='cadastro.php';</script>";
                die();
            } else {
                $sql = "INSERT INTO usuario (email, senha, funcao) VALUES ('$login', '$senha', '$tipo')";
                $result = $conn->query($sql);
                if ($result) {
                    echo "<script language='javascript' type='text/javascript'>alert('Cadastro realizado com sucesso!');</script>";
                    die();
                } else {
                    echo "<script language='javascript' type='text/javascript'>alert('Erro no cadastro');window.location.href='cadastro.php';</script>";
                    die();
                }
            }
        } else {
            echo "<script language='javascript' type='text/javascript'>alert('Senhas não correspondem!');window.location.href='cadastro.php';</script>";
            die();
        }
    }
}
?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>