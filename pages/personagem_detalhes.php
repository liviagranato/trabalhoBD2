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
    <div class="container">

        <!-- Portfolio Item Heading -->
        <h1 class="my-4">Konata Izumi
            <small>"Kona-chan, KonaKona, Densetsu no Shoujo A"</small>
        </h1>
        <div class="row row-personagem-detalhes">
            <div class="col-md-2 col-sm-6 mb-4 imagem-perfil-personagem">
                <a href="#">
                    <img class="img-fluid"  src="../resource/konata-perfil.jpg" alt="">
                </a>
            </div>

            <div class="div-personagem-detalhes">
                <h3 class="my-2">Curiosidades</h3>
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

        <h3 class="my-3">Descrição</h3>
        <div class="row">
            <div class="descricao-texto-personagem" id="descricao-personagem">
                Konata Izumi is, more by default than anything else, the "leader" of the main characters.
                    Nicknamed "Kona-chan" by her friends, she is an eccentric but friendly and outgoing girl,
                    with a mischeivous but good-natured sense of humor. She can be smart, but she hates studying,
                    thus her grades are a bit uneasy. However, she is an expert in pulling an "all-nighter."
                    In contrast to her studying habits, she loves video games, to the extent that she can compete against
                    Kagami Hiiragi on trivia games (by remembering the question orders, not by knowing the actual answers).
                    In addition, she loves anime, which is also due to her father, Soujirou Izumi's influence, along with the games.
                    He buys ero-games for himself, so she is able to play and enjoy them. In fact, when she became eighteen,
                    Konata was overjoyed, since she could now go buy and play ero-games legally. In the anime, Konata constantly refers
                    to or parodies several popular games, anime, and manga (much to the annoyance of Kagami), but her favorite franchise seems
                    to be the Haruhi series, as she has many Haruhi figurines and decorations that makes her room, and even once went to the
                    Suzumiya Haruhi no Gekisou with her friends. She often gives false information to her family, thus making her father believe
                    that Kagami and Tsukasa are shrine maidens. Interestingly enough, her voice actress for the animated version, Aya Hirano and
                    Wendee Lee, is in fact the same person who voiced Haruhi Suzumiya in The Melancholy of Haruhi Suzumiya anime; other voice actors
                    from the same series make guest appearances during the course of Lucky ☆ Star.
                    <br/><br/>Since she spends quite a large sum of money on video games and doujinshi, Konata was lucky enough to get a part-time job at a cosplay cafe. Continuing with her theme of playing video games, Konata plays the role of a male character in an online game and is married in that world. Her significant other in the game is coincidently a male gamer using a female character. She often plays late into the night, hence why she tends to fall asleep in class, which makes her a frequent victim to her homeroom teacher, Nanako Kuroi. One of her talents as mentioned on the show is that she can name all the Pok$#!ns
                    <br/><br/>Her physique is smaller than average when compared to her peers, which she claims hasn't changed, since she was in the sixth grade. She is ambidextrous, in contrast to the mostly left-handed main cast. She has long, blue hair which comes down to her calves with a large ahoge, sleepy eyes and a beauty mark under her left eye, just like her father. Her mother, Kanata Izumi, died when she was an infant, and she has lived alone with her father since. In her third year of high school, however, her cousin, Yutaka Kobayakawa, came to live at her house, giving a total of three people in the Izumi residence.
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
