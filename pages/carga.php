<html><head><title>Inserindo dados no banco</title></head>
<body>
<?php
/* insert students into DB */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new mysqli('localhost', 'root', '', 'api_mal');
    if ($db->connect_errno)
        echo "Erro na conexão com o banco de dados: " . $db->connect_error;
    $sql = "INSERT INTO aluno VALUES(" . $_POST["matric"] . ",'" .
        $_POST["nome"] . "','" . $_POST["endereco"] . "','" . $_POST["email"] . "')";
    echo $sql;
    if (!$db->query($sql))
        echo "Erro na execução da query";
    $db->close();
    echo"<h3>Obrigado. Seus dados foram inseridos</h3> \n";
    echo'<p><a href="principal.php">Pagina inicial</a></p>' . "\n";
} else {
    ?>
    <h3>Entre com seus dados</h3>
    <form action="data_in.php" method="post">
        Matricula: <input type="number" name="matric" /> <br/>
        Nome......: <input type="text" name="nome" /> <br/>
        Endereco.: <input type="text" name="endereco" /> <br/>
        email.......: <input type="text" name="email" /> <br/>
        <br/>
        <input type="submit" name="submit" /> <input type="reset" />
    </form>
    <p><a href="principal.php">Pagina inicial</a></p>
<?php } ?>
</body></html>
