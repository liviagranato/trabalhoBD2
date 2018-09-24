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
    <a class="nav-detalhes-personagem">Detalhes do Anime</a>
</nav>
<div class="container">

    <!-- Portfolio Item Heading -->
    <h1 class="my-4">Lucky Star</h1>
    <div class="row row-personagem-detalhes">
        <div class="col-md-2 col-sm-6 mb-4 imagem-perfil-personagem">
            <a href="#">
                <img class="img-fluid"  src="../resource/lucky-star.jpg" alt="">
            </a>
        </div>

        <div class="div-personagem-detalhes">
            <h3 class="my-3">Project Description</h3>
            Age: 18 <br/>
            Birthday: May 28 <br/>
            Height: 142 cm (4'8") <br/>
            Handedness: Ambidextrous <br/>
            Zodiac Sign: Gemini <br/>
            Residence: Satte, Saitama Prefecture <br/>
            Blood type: A <br/>
            Strong Subjects: PE (However, it is not her favorite subject) <br/>
            Disliked Subjects: Math, Science <br/>
            Favorite Food: Choco Cornet, Curry, Noodles <br/>
            Favorite Color: Red <br/>
            Hair Color: Blue <br/>
            Eye Color: Green <br/>
            Online Name: Konakona <br/>
            <b>Member Favorites: 14,226</b> <br/>
        </div>
    </div>

    <h3 class="my-3">Sinopse</h3>
    <div class="row">
        <div class="descricao-texto-personagem">
            Lucky☆Star follows the daily lives of four cute high school girls—Konata Izumi,
            the lazy otaku; the Hiiragi twins, Tsukasa and Kagami (sugar and spice, respectively);
            and the smart and well-mannered Miyuki Takara.
            As they go about their lives at school and beyond, they develop their eccentric and lively friendship
            and making humorous observations about the world around them. Be it Japanese tradition, the intricacies
            of otaku culture, academics, or the correct way of preparing and eating various foods—no subject is safe from their musings.
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
    </div>

    <?php } ?>
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
