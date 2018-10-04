<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">MyAnimeList</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Busca
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="anime.php">Anime</a>
                    <a class="dropdown-item" href="manga.php">Manga</a>
                    <a class="dropdown-item" href="personagem.php">Personagem</a>
                    <a class="dropdown-item" href="pessoas.php">Staff</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ranking (Score)
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="ranking_anime.php">Top 100 Anime</a>
                    <a class="dropdown-item" href="ranking_manga.php">Top 100 Manga</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="temporada.php">Temporada</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cronograma.php">Cronograma</a>
            </li>

        </ul>
<!--        <form class="form-inline my-2 my-lg-0">-->
<!--            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->
<!--            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
<!--        </form>-->




<?php
$funcao = $_COOKIE['inputFuncao'];
echo '<div class="right">
        <lu class="navbar-nav mr-auto">
            <li class="nav-item right">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        
    ';

if (isset($_COOKIE['inputFuncao']) && $_COOKIE['inputFuncao'] == '1') {
    echo '<li class="nav-item right">
                <a class="nav-link" href="cadastro.php">Cadastro</a>
            </li>
        ';
}
echo '</lu></div></div></nav>';
?>