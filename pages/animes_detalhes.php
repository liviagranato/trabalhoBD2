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
    <title>Anime</title>
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
    <h1 class="my-4">Lucky Star</h1>
    <div class="row info-cell">
        <div class="info-cell-row col-md-9 col-md-push-3">
            <div class="row">
                <div class="col">
                    <b>SCORE</b>
                    <div class="text-score">7.82</div>
                    <div class="text-users">193,339 users</div>
                </div>
                <div class="col ">Ranked <b>#850</b></div>
                <div class="col ">Popularity <b>#142</b></div>
                <div class="col ">Members <b>393,186</b></div>
            </div>
        </div>
    </div>
    <div class="row row-anime-detalhes">

        <div class="imagem-perfil-anime">
            <a href="#">
                <img class="img-fluid"  src="../resource/lucky-star.jpg" alt="">
            </a>
        </div>

        <div class="div-informacao-anime">
            <h3 class="my-3">Informação</h3>
            Type: TV<br/>
            Episodes: 24<br/>
            Status: Finished Airing<br/>
            Aired: Apr 8, 2007 to Sep 17, 2007<br/>
            Premiered: Spring 2007<br/>
            Broadcast: Mondays at 00:00 (JST)<br/>
            Producers: Lantis, Rakuonsha, Lucky Paradise<br/>
            Licensors: Funimation, Bandai Entertainment, Kadokawa Pictures USA<br/>
            Studios: Kyoto Animation<br/>
            Source: 4-koma manga<br/>
            Genres: Slice of Life, Comedy, Parody, School<br/>
            Duration: 24 min. per ep.<br/>
            Rating: PG-13 - Teens 13 or older<br/>
        </div>

        <div class="div-estatisticas-anime">
            <h3 class="my-3">Estatísticas</h3>
            Score: 7.821 (scored by 193,339 users)<br/>
            Ranked: #8502<br/>
            Popularity: #142<br/>
            Members: 393,183<br/>
            Favorites: 9,816<br/>

            <h3 class="my-3">Títulos Alternativos</h3>
            English: Lucky☆Star<br/>
            Synonyms: Lucky Star<br/>
            Japanese: らき☆すた<br/>


        </div>
    </div>

    <h3 class="my-3">Sinopse</h3>
    <div class="row">
        <div class="descricao-texto-personagem">
            Lucky☆Star follows the daily lives of four cute high school girls—Konata Izumi,
            the lazy otaku; the Hiiragi twins, Tsukasa and Kagami (sugar and spice, respectively);
            and the smart and well-mannered Miyuki Takara.
            <br/><br/>As they go about their lives at school and beyond, they develop their eccentric and lively friendship
            and making humorous observations about the world around them. Be it Japanese tradition, the intricacies
            of otaku culture, academics, or the correct way of preparing and eating various foods—no subject is safe from their musings.
            </div>
    </div>

    <h3 class="my-4">Dubladores Idioma Original</h3>
    <table class="table table-striped card-dubladores">
        <tbody>
        <tr>
            <td>
                <div>
                    <img class="img-dubladores-card left card-espacamento" src="../resource/konata-perfil.jpg">
                    <div class="img-dubladores-text">Izumi, Konata</div>
                </div>
            </td>
            <td>
                <div>
                    <img class="img-dubladores-card right card-espacamento" src="../resource/dubladora1.jpg">
                    <div class="img-dubladores-text right">Hirano, Aya</div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div>
                    <img class="img-dubladores-card left card-espacamento" src="../resource/kagami.jpg">
                    <div class="img-dubladores-text">Hiiragi, Kagami</div>
                </div>
            </td>
            <td>
                <div>
                    <img class="img-dubladores-card right card-espacamento" src="../resource/katou_dubl.jpg">
                    <div class="img-dubladores-text right">Katou, Emiri</div>
                </div>
            </td>
        </tr>
        <tr>
            <td >
                <div>
                    <img class="img-dubladores-card left card-espacamento" src="../resource/tsukasa.jpg">
                    <div class="img-dubladores-text">Hiiragi, Tsukasa</div>
                </div>
            </td>
            <td>
                <div>
                    <img class="img-dubladores-card right card-espacamento" src="../resource/fukuhara_dubl.jpg">
                    <div class="img-dubladores-text right">Fukuhara, Kaori</div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div>
                    <img class="img-dubladores-card left card-espacamento" src="../resource/miyumi.jpg">
                    <div class="img-dubladores-text">Takara, Miyuki</div>
                </div>
            </td>
            <td>
                <div>
                    <img class="img-dubladores-card right card-espacamento" src="../resource/endou_dubl.jpg">
                    <div class="img-dubladores-text right">Endou, Aya</div>
                </div>
            </td>
        </tr>
        <tr>
            <td >
                <div>
                    <img class="img-dubladores-card left card-espacamento" src="../resource/akira.jpg">
                    <div class="img-dubladores-text">Kogami, Akira</div>
                </div>
            </td>
            <td>
                <div>
                    <img class="img-dubladores-card right card-espacamento" src="../resource/konno_dubl.jpg">
                    <div class="img-dubladores-text right">Konno, Hiromi</div>
                </div>
            </td>
        </tr>
        </tbody>
    </table>


    <div class="left">
    <h3 class="my-3">Tema de Abertura</h3>
        <div class="row">
            <div class="descricao-texto-personagem">
                "Motteke! Sailor Fuku" by Aya Hirano, Emiri Katou, Kaori Fukuhara & Aya Endou
            </div>
        </div>
        <h3 class="my-3">Tema de Encerramento</h3>
        <div class="row">
            <div class="descricao-texto-personagem">
                #01: "Uchuu Tetsujin Kyoodain (宇宙鉄人キョーダイン)" by Aya Hirano (ep 1) <br/>
                #02: "Shouri da! Akumaizer 3 (勝利だ!アクマイザー3)" by Aya Hirano (ep 2)<br/>
                #03: "Sore ga, Ai Deshou (それが, 愛でしょう)" by Aya Hirano (ep 3)<br/>
                #04: "Sailor Fuku to Kikanjuu (セーラー服と機関銃)" by Emiri Kato (ep 4)<br/>
                #05: "Cha-La Head-Cha-La" by Aya Hirano (ep 5)<br/>
                #06: "Valentine Kiss (バレンタイン・キッス)" by Kaori Fukuhara (ep 6)<br/>
                #07: "Chijou no Hoshi (地上の星)" by Aya Endo (ep 7)<br/>
                #08: "Monkey Magic" by Aya Hirano (ep 8)<br/>
                #09: "Kogarashi ni Dakarete (木枯しに抱かれて)" by Aya Hirano (ep 9)<br/>
                #10: "I'm Proud" by Emiri Kato (ep 10)<br/>
                <br/><br/><br/>
            </div>
        </div>
    </div>
    <div class="right">
        <h3 class="my-3">Animes Relacionados</h3>
        <div class="row">
            <div class="descricao-texto-personagem">
                Adaptation:	Lucky☆Star<br/>
                Character:	Anime Tenchou<br/>
                Sequel:	Lucky☆Star: Original na Visual to Animation<br/>
                Spin-off:	Miyakawa-ke no Kuufuku

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
