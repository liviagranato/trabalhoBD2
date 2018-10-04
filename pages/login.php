<!doctype html>
<html lang="en" class="fundo_login">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Login</title>
</head>
<body class="fundo_login">
<div class="container">
    <div class="card2 card-container">
        <h1 class="center">Login</h1>
        <br/>
        <p id="profile-name" class="profile-name-card"></p>
        <form class="form-signin" method="post" action="login.php">
            <span id="reauth-email" class="reauth-email"></span>
            <label for="inputEmail">Email *</label>
            <input type="email" id="inputEmail" name="inputEmail" class="form-control" value="admin@admin.com.br" placeholder="Email" required autofocus>
            <label for="inputPassword">Senha *</label>
            <input type="password" id="inputPassword" name="inputPassword" class="form-control" value="admin" placeholder="Senha" required>
            <br/><br/>
            <button class="btn-2 btn-lg btn-primary btn-block btn-signin" type="submit" name="registrar" value="registrar">Login</button>
        </form><!-- /form -->
    </div><!-- /card-container -->
</div>

<?php

include_once 'conexao.php';

if (isset($_POST['registrar'])) {
    $login = $_POST['inputEmail'];
    $senha = ($_POST['inputPassword']);
    $sql = "SELECT * FROM usuario WHERE email = '$login' AND senha = '$senha'";
    $result = $conn->query($sql);
    if ($result->num_rows <= 0){
        echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.php';</script>";
        die();
    }else{
        $row = $result->fetch_assoc();
        if ($row['funcao']==1) {
            setcookie("inputEmail", $login);
            setcookie('inputFuncao', '1');
            header("Location:cadastro.php");
        } else {
            setcookie("inputEmail", $login);
            setcookie('inputFuncao', '2');
            header("Location:index.php");
        }
    }
}
?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>
</html>