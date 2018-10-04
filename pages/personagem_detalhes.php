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
    <title>Detalhes Personagens</title>

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
        $id = $_GET['id'];
        $sql = "SELECT * FROM personagem WHERE id = '$id'";
        $result = $conn->query($sql);



        if ($result->num_rows > 0) {
            echo '<div class="container">';

            while ($row = $result->fetch_assoc()) {
                $name = $row['name'];
                $name_kanji = $row['name_kanji'];
                $nickname = $row['nickname'];
                $about = $row['about'];
                $memberFavorites = $row['memberFavorites'];
                $img =$row['img'];

                echo '<h1 class="my-4">'.$name.'
                        <small>'.$nickname.', '.$name_kanji.'</small>
                        </h1>
                        <div class="row row-personagem-detalhes">
                            <div class="col-md-1 col-sm-6 mb-4 imagem-perfil-personagem">
                                <a href="#">
                                    <img class="img-fluid"  src="'.$img.'" alt="">
                                </a>
                            </div>
                            <h3 class="my-3">Descrição</h3>
                            <div class="row">
                                <div class="col-md-11 col-sm-6 mb-4 descricao-texto-personagem" id="descricao-personagem">
                                    '.$about.'
                                </div>
                            </div>
                        </div>';

            }
        }

$sql = "SELECT p.id, d.FK_Personagem_id, d.FK_Person_id, pe.id as id_person, pe.image, pe.name  FROM personagem as p left join dubla as d on p.id=d.FK_Personagem_id 
left join person as pe on d.FK_Person_id=pe.id where p.id='$id'";
$result = $conn->query($sql);
$dubladores = array();
$index = 0;
$num_registros=0;
if ($result->num_rows > 0) {
    echo '<h3 class="my-4">Dubladores</h3>
                        <div class="row img-dubladores">';
               


    while ($row = mysqli_fetch_assoc($result)) {
        $dubladores[$index] = $row['name'];
        $dubladoresFoto[$index] = $row['image'];
        $id_person = $row['id_person'];
        if (!$dubladores[$index]) {

        } else {
            echo ' 
                 <div class="col-md-3 col-sm-6 mb-4 personagem-detalhes-card-dubladores" onclick="window.location.href=\'pessoa_detalhes.php?id='.$id_person.'\'">                   
                    <a href="#"><img class="img-fluid" src="'.$dubladoresFoto[$index].'" alt=""></a>           
                    <div>
                        <h4>'.$dubladores[$index].'</h4>
                    </div>
                </div>';
            $index++;
            $num_registros++;
            if($num_registros == 5){
                break;
            }
        }
    }
    echo '</tbody>
        </table>';

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
