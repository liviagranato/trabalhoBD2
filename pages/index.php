<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Hello, world!</title>
</head>
<body class="background-index">
<?php include 'navbar.php';
require_once "../vendor/autoload.php"; // require your composer autoloader file wherever it is

$jikan = new Jikan\Jikan;

for ($i=1; $i<10; $i++){
      try {
        var_dump($jikan->Anime($i)->response);
        echo '</br></br>';
        var_dump($jikan->Manga($i)->response); 
        echo '</br></br>';
          echo '<script>';
          echo 'console.log(' . $i . ')';
          echo '</script>';
    } catch (Exception $e) {
        echo '<script>';
        echo 'console.log(';
        echo 'Caught exception: ', $e->getMessage(); // "File does not exist" (the anime with this ID doesn't exist on MAL)
        echo ');';
        echo '</script>';    
    }
    sleep(3);
}
?>

<div>


</div>
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