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
    <title>Manga</title>
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
<div class="container">

    <!-- Portfolio Item Heading -->
    <h1 class="my-4">Berserk</h1>
    <div class="row info-cell">
        <div class="info-cell-row col-md-9 col-md-push-3">
            <div class="row">
                <div class="col">
                    <b>SCORE</b>
                    <div class="text-score">9.31</div>
                    <div class="text-users">95.962 users</div>
                </div>
                <div class="col  ">Ranked <b>#1</b></div>
                <div class="col ">Popularity <b>#6</b></div>
                <div class="col ">Members <b>203,913</b></div>
            </div>
        </div>
    </div>
    <div class="row row-anime-detalhes">

        <div class="imagem-perfil-manga">
            <a href="#">
                <img class="img-fluid"  src="../resource/berserk_manga.jpg" alt="">
            </a>
        </div>

        <div class="div-informacao-manga">
            <h3 class="my-3">Informação</h3>
            Type: Manga<br/>
            Volumes: Unknown<br/>
            Chapters: Unknown<br/>
            Status: Publishing<br/>
            Published: Aug 25, 1989 to ?<br/>
            Genres: Action, Adventure, Demons, Drama, Fantasy, Horror, Supernatural, Military, Psychological, Seinen<br/>
            Authors: Miura, Kentarou (Story & Art)<br/>
            Serialization: Young Animal<br/>
        </div>

        <div class="div-estatisticas-manga">
            <h3 class="my-3">Estatísticas</h3>
            Score: 9.311 (scored by 95962 users)<br/>
            Ranked: #12<br/>
            Popularity: #6<br/>
            Members: 203,913<br/>
            Favorites: 44,358<br/>

            <h3 class="my-3">Títulos Alternativos</h3>
            English: Berserk<br/>
            Synonyms: Berserk: The Prototype<br/>
            Japanese: ベルセルク<br/>

        </div>
    </div>

    <h3 class="my-3">Sinopse</h3>
    <div class="row">
        <div class="descricao-texto-personagem">
            Guts, a former mercenary now known as the "Black Swordsman," is out for revenge. After a tumultuous childhood,
            he finally finds someone he respects and believes he can trust, only to have everything fall apart when this person takes
            away everything important to Guts for the purpose of fulfilling his own desires.
            Now marked for death, Guts becomes condemned to a fate in which he is relentlessly pursued by demonic beings.
            <br/>Setting out on a dreadful quest riddled with misfortune, Guts, armed with a massive sword and monstrous strength,
            will let nothing stop him, not even death itself,
            until he is finally able to take the head of the one who stripped him—and his loved one—of their humanity.
            <br/><br/>
            <b>Included one-shot:</b>
            <br/>Volume 14: Berserk: The Prototype
        </div>
    </div>

    <h3 class="my-4">Personagens Principais</h3>
    <table class="table table-striped card-dubladores">
        <tbody>
        <tr>
            <td>
                <div>
                    <img class="img-dubladores-card left card-espacamento" src="../resource/puck.jpg">
                    <div class="img-dubladores-text">Guts</div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div>
                    <img class="img-dubladores-card left card-espacamento" src="../resource/griffith.jpg">
                    <div class="img-dubladores-text">Griffith</div>
                </div>
            </td>
        </tr>
        <tr>
            <td >
                <div>
                    <img class="img-dubladores-card left card-espacamento" src="../resource/casca.jpg">
                    <div class="img-dubladores-text">Casca</div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div>
                    <img class="img-dubladores-card left card-espacamento" src="../resource/schierke.jpg">
                    <div class="img-dubladores-text">Schierke</div>
                </div>
            </td>
        </tr>
        <tr>
            <td >
                <div>
                    <img class="img-dubladores-card left card-espacamento" src="../resource/puck.jpg">
                    <div class="img-dubladores-text">Puck</div>
                </div>
            </td>
        </tr>
        </tbody>
    </table>

    <div class="right">
        <h3 class="my-3">Mangas Relacionados</h3>
        <div class="row">
            <div class="descricao-texto-personagem">
                Other:	Berserk: Shinen no Kami 2, Berserk: Honou Ryuu no Kishi
                <br/>Adaptation:	Berserk: Ougon Jidai-hen II - Doldrey Kouryaku, Berserk: Ougon Jidai-hen I - Haou no Tamago, Berserk: Ougon Jidai-hen III - Kourin, Kenpuu Denki Berserk, Berserk, Berserk 2nd Season
            <br/><br/><br/><br/>
            </div>
        </div>
    </div>
    <br/>
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
