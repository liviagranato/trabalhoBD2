<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="../CSS/style.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Consultar</title>
</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new mysqli('localhost', 'root', '', 'api_mal');
    if ($db->connect_errno) echo "Erro na conexão com o banco de dados: " . $db->connect_error;
    if (!isset($_POST['c_matric'])) {
        exit(0);
    }
    $sql = "SELECT * FROM aluno WHERE matric=" . $_POST['c_matric'] . ";";
    $result = $db->query($sql);
    if (!$result) echo "Erro na execução da query";
    while ($row = $result->fetch_assoc()) {
        echo "<h4> Nome: " . $row["nome"] . "</h4> \n";
        echo "<h5> Matricula: " . $row["matric"] . "<br/> Email: " . $row["email"] . "<br/>
        Endereco: " . $row["endereco"] . "</h5> \n";
    }
    $db->close();
    echo '<p><a href="principal.php">Pagina inicial</a></p>' . "\n";
} else { ?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <nav class="nav">
        <a class="nav-detalhes-personagem">Detalhes do Personagem</a>
    </nav>

        <?php }
        include_once "conexao.php";
        //$id = $_SESSION['Id'];
        $sql = "SELECT * FROM personagem WHERE Id = '1'";
        $result = $conn->query($sql);



        if ($result->num_rows > 0) {
            echo '<div class="container">';

            while ($row = $result->fetch_assoc()) {
                $name = $row['name'];
                $name_kanji = $row['name_kanji'];
                $nickname = $row['nickname'];
                $about = $row['about'];
                $memberFavorites = $row['memberFavorites'];
                $url = $row['Url'];
                $img =$row['img'];

                //FALTA ADICIONAR CURIOSIDADES (TABELA PERSON), DUBLADORES

                echo '<h1 class="my-4">'.$name.'
                        <small>'.$nickname.', '.$name_kanji.'</small>
                        </h1>
                        <div class="row row-personagem-detalhes">
                            <div class="col-md-2 col-sm-6 mb-4 imagem-perfil-personagem">
                                <a href="#">
                                    <img class="img-fluid"  src="'.$img.'" alt="">
                                </a>
                            </div>
                
                            <div class="div-personagem-detalhes">
                                <h3 class="my-2">Curiosidades</h3>
                                Idade:  <br/>
                                Aniversário:  <br/>
                                Altura:  <br/>
                                Servidão:  <br/>
                                Signo:  <br/>
                                Residência: Satte, <br/>
                                Tipo Sanguíneo:  <br/>
                                Matérias Preferidas: <br/>
                                Piores matérias: <br/>
                                Comida preferida:  <br/>
                                Cor favorita:  <br/>
                                Cor do cabelo:  <br/>
                                Cor dos olhos:  <br/>
                                Nome online:  <br/>
                                <b>Favoritos: '.$memberFavorites.'</b> <br/>
                            </div>
                        </div>
                
                        <h3 class="my-3">Descrição</h3>
                        <div class="row">
                            <div class="descricao-texto-personagem" id="descricao-personagem">
                                '.$about.'
                                </div>
                        </div>
                
                        <h3 class="my-4">Dubladores</h3>
                        <div class="row img-dubladores">
                            <div class="col-md-3 col-sm-6 mb-4 personagem-detalhes-card-dubladores">
                                <a href="#">
                                    <img class="img-fluid" src="../resource/dubladora1.jpg" alt="">
                                </a>
                                <div>
                                    <h3>Hirano, Aya</h3>
                                    <p>Japanese</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-4 personagem-detalhes-card-dubladores">
                                <a href="#">
                                    <img class="img-fluid" src="../resource/dubladora.jpg" alt="">
                                </a>
                                <div>
                                    <h3>Lee, Wendee</h3>
                                    <p>English</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-4 personagem-detalhes-card-dubladores">
                                <a href="#">
                                    <img class="img-fluid" src="../resource/dubladora2.jpg" alt="">
                                </a>
                                <div>
                                    <h3>Jeong, Yu Mi</h3>
                                    <p>Korean</p>
                                </div>
                            </div>
                </div>';
            }
        }

        $conn->close();
        ?>

</body>
</html>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>
</html>
