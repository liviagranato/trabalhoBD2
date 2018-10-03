<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Cronograma de Animes</title>
</head>
<body>
<?php include 'navbar.php';?>

<nav class="nav nav2">
    <a class="nav-link " href="cronograma_segunda.php" onclick="atualizaCronograma('Mon')">Segunda</a>
    <a class="nav-link active" href="cronograma_terca.php" onclick="atualizaCronograma('Tue')">Terça</a>
    <a class="nav-link" href="cronograma_quarta.php" onclick="atualizaCronograma('Wed')">Quarta</a>
    <a class="nav-link" href="cronograma_quinta.php" onclick="atualizaCronograma('Thi')">Quinta</a>
    <a class="nav-link" href="cronograma_sexta.php" onclick="atualizaCronograma('Fri')">Sexta</a>
    <a class="nav-link" href="cronograma_sabado.php" onclick="atualizaCronograma('Sat')">Sábado</a>
    <a class="nav-link" href="cronograma_domingo.php" onclick="atualizaCronograma('Sun')">Domingo</a>
</nav>
<body>
<div class="container2">

    <?php
    include_once "conexao.php";
    include "funcoes.php";

    $sql = "SELECT * FROM anime where broadcast like '%Tuesday%'";
    $result = $conn->query($sql);
    $count=0;

    if ($result->num_rows > 0) {
        $aux = ceil(($result->num_rows)/4);
        ob_start();
        echo '<div class="container">';
        for ($i=0; $i<$aux; $i++){
            echo '<div class="row">';
            while ($row = $result->fetch_assoc()) {

                $titulo = $row['title'];
                $rank = $row['rank'];
                $score = $row['score'];
                $url_img = $row['img_url'];
                $id = $row['Id'];
                echo
                    '<div class="col-sm-3">
                        <div class="card card-imagem" onclick="window.location.href=\'animes_detalhes.php?id='.$id.'\'">
                            <img class="card-img" data-src="holder.js/100px260/" alt="100%x260" src="' . $url_img . '">
                            <div class="div-titulo"><p class="titulo">#'.$rank.'  ' . $titulo . ' - <i class="fa fa-star" style="color: yellow"> '.$score.'</i></p></div>
                    </div>
                </div>';

            }
            echo '</div>';
        }
        echo '</div>';
    }

    $conn->close();
    if (isset($_GET['submit'])) {
        $nome = $_GET['busca'];
        if($nome!='') {

            buscar($nome, 'anime');
        }
    }
    ?>
</div>
</div>


<?php
function atualizaCronograma($dia){

}


?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>