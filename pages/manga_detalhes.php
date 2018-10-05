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

    <title>Detalhes Manga</title>

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
    <a class="nav-detalhes-personagem">Detalhes do Manga</a>
</nav>

    <?php }
    include_once "conexao.php";
    $id = $_GET['id'];
    $generos ='';
    $consulta_generos = "SELECT m.id, gm.FK_manga_id, gm.FK_genre_id, g.id_genre, g.nome FROM manga as m LEFT JOIN genre_manga as gm on m.id = gm.FK_manga_id left join genre as g on gm.FK_genre_id = g.id_genre WHERE m.id = '$id'";
    $resultado_generos = $conn->query($consulta_generos);
    if ($resultado_generos->num_rows > 0){
        while ($row = $resultado_generos->fetch_assoc()){
            $generos .= $row['nome'].'; ';
        }
    }

    $autores ='';
    $consulta_autores = "SELECT m.id, ma.FK_manga_id, ma.FK_author_id, a.authors_PK, a.name  FROM manga as m LEFT JOIN manga_author as ma on m.id = ma.FK_manga_id left join author as a on ma.FK_author_id = a.authors_PK WHERE m.id = '$id'";
    $resultado_autores = $conn->query($consulta_autores);
    if ($resultado_autores->num_rows > 0){
        while ($row = $resultado_autores->fetch_assoc()){
            $autores .= $row['name'].'; ';
        }
    }

    $sql = "SELECT * FROM manga WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<div class="container">';

        while ($row = $result->fetch_assoc()) {
            $url_img = $row['img'];
            $volume = $row['volume'];
            $chapter = $row['chapter'];
            $status = $row['status'];
            $score = $row['score'];
            $rating = $row['rating'];
            $popularity = $row['popularity'];
            $members = $row['members'];
            $favorites = $row['favorites'];
            $description = $row['description'];
            $titulo = $row['title'];
            $titulo_eng = $row['title_eng'];
            $titulo_jap = $row['title_jap'];
            $type = $row['type'];
            $is_publishing = $row['is_publishing'];
            $published = $row['published'];
            $scored_by = $row['scored_by'];
            $rank  = $row['rank'];
            $broadcast = $row['broadcast'];

            echo '<h1 class="my-4">'.$titulo.'</h1>
                    <div class="row info-cell">
                        <div class="info-cell-row col-md-9 col-md-push-3">
                            <div class="row">
                                <div class="col">
                                    <b>SCORE</b>
                                    <div class="text-score">'.$score.'</div>
                                    <div class="text-users">'.$scored_by.' users</div>
                                </div>
                                <div class="col  ">Rank <b>#'.$rank.'</b></div>
                                <div class="col ">Popularidade <b>#'.$popularity.'</b></div>
                                <div class="col ">Membros <b>'.$members.'</b></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row row-anime-detalhes">
                        <div class="imagem-perfil-manga">
                            <a href="#">
                                <img class="img-fluid"  src="'.$url_img.'" alt="">
                            </a>
                        </div>
                
                        <div class="div-informacao-manga">
                            <h3 class="my-3">Informação</h3>
                            Tipo: '.$type.'<br/>
                            Volumes: '.$volume.'<br/>
                            Capítulos: '.$chapter.'<br/>
                            Status: '.$status.'<br/>
                            Publicado em: '.$published.'<br/>
                            Gêneros: '.$generos.'<br/>
                            Autores: '.$autores.'<br/>
                        </div>
                
                        <div class="div-estatisticas-manga">
                            <h3 class="my-3">Estatísticas</h3>
                            Score: '.$score.' (Avaliado por: '.$scored_by.' usuários)<br/>
                            Rank: #'.$rank.'<br/>
                            Popularidade: #'.$popularity.'<br/>
                            Membros: '.$members.'<br/>
                            Favoritos: '.$favorites.'<br/>
                
                            <h3 class="my-3">Títulos Alternativos</h3>
                            Inglês: '.$titulo_eng.'<br/>
                            Japonês: '.$titulo_jap.'<br/>
                
                        </div>
                    </div>
                    <h3 class="my-3">Sinopse</h3>
                        <div class="row">
                            <div class="descricao-texto-personagem">
                                '.$description.'
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
