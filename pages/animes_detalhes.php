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


    <?php }
    include_once "conexao.php";
    //$id = $_SESSION['Id'];
    $sql = "SELECT * FROM anime WHERE Id = '1'";
    $result = $conn->query($sql);



    if ($result->num_rows > 0) {
        echo '<div class="container">';

        while ($row = $result->fetch_assoc()) {
            $titulo = $row['title'];
            $titulo_eng = $row['title_eng'];
            $titulo_jap = $row['title_jap'];
            $title_synonyms = $row['title_synonyms'];
            $url_img = $row['img_url'];
            $type = $row['type'];
            $source_type =$row['source_type'];
            $episodes = $row['episodes'];
            $status = $row['status'];
            $aired_string = $row['aired_string'];
            $duration = $row['duration'];
            $rating = $row['rating'];
            $score = $row['score'];
            $scored_by = $row['scored_by'];
            $rank  = $row['rank'];
            $popularity = $row['popularity'];
            $members = $row['members'];
            $favorites = $row['favorites'];
            $synopses = $row['synopses'];
            $premiered = $row['premiered'];
            $broadcast = $row['broadcast'];
            //FALTA ADICIONAR PRODUTORES, LICENSORS,STUDIOS, GENEROS, TEMA ABERTURA, TEMA FECHAMENTO, ANIMES RELACIONADOS, DUBLADORES(TABELA)

            echo '<h1 class="my-4">'.$titulo.'</h1>
                    <div class="row info-cell">
                        <div class="info-cell-row col-md-9 col-md-push-3">
                            <div class="row">
                                <div class="col">
                                    <b>SCORE</b>
                                    <div class="text-score">'.$score.'</div>
                                    <div class="text-users">'.$scored_by.'</div>
                                </div>
                                <div class="col ">Ranked <b>#'.$rank.'</b></div>
                                <div class="col ">Popularity <b>#'.$popularity.'</b></div>
                                <div class="col ">Members <b>'.$members.'</b></div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-anime-detalhes">

                        <div class="imagem-perfil-anime">
                            <a href="#">
                                <img class="img-fluid"  src="'.$url_img.'" alt="">
                            </a>
                        </div>
                
                        <div class="div-informacao-anime">
                            <h3 class="my-3">Informação</h3>
                            Tipo: '.$type.' <br/>
                            Episódios: '.$episodes.'<br/>
                            Status: '.$status.'<br/>
                            Estreado em: '.$aired_string.'<br/>
                            Premier: '.$premiered.'<br/>
                            Transmissão: '.$broadcast.'<br/>
                            Produtores: <br/>                                                                        
                            Licenciadores: <br/>
                            Estúdios: <br/>
                            Fonte: '.$source_type.'<br/>
                            Gêneros: <br/>
                            Duração: '.$duration.'<br/>
                            Avaliação: '.$rating.'<br/>
                        </div>
                
                        <div class="div-estatisticas-anime">
                            <h3 class="my-3">Estatísticas</h3>
                            Score: '.$score.' (Avaliado por: '.$scored_by.' usuários)<br/>
                            Rank: '.$rank.'<br/>
                            Popularidade: '.$popularity.'<br/>
                            Membros: '.$members.'<br/>
                            Favoritos: '.$favorites.'<br/>
                
                            <h3 class="my-3">Títulos Alternativos</h3>
                            Inglês: '.$titulo_eng.'<br/>
                            Sinônimos: '.$title_synonyms.'<br/>
                            Japonês: '.$titulo_jap.'<br/>
                        </div>
                    </div>
                    <h3 class="my-3">Sinopse</h3>
                    <div class="row">
                        <div class="descricao-texto-personagem">
                            '.$synopses.'
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
                                   
                                </div>
                            </div>
                            <h3 class="my-3">Tema de Encerramento</h3>
                            <div class="row">
                                <div class="descricao-texto-personagem">
                                    
                                    <br/><br/><br/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="right">
                            <h3 class="my-3">Animes Relacionados</h3>
                            <div class="row">
                                <div class="descricao-texto-personagem">
                                    
                    
                                </div>
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
