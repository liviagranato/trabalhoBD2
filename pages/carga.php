<html><head><title>Inserindo dados no banco</title></head>
<body>

<?php
    $db = new mysqli('localhost', 'root', '', 'api_mal');
    if ($db->connect_errno)
        echo "Erro na conexão com o banco de dados: " . $db->connect_error;
    require_once "../vendor/autoload.php"; // require your composer autoloader file wherever it is

    $jikan = new Jikan\Jikan;
    // $db->insert_id
    for ($i=1; $i<10000; $i++){
        try {
            $json = $jikan->Anime($i);
            var_dump($json);
        } catch (Exception $e) {
            echo '<script>';
            echo 'console.log(';
            echo 'Caught exception: ', $e->getMessage(); // "File does not exist" (the anime with this ID doesn't exist on MAL)
            echo ');';
        }
        $anime = $json->{'response'};

        try {
            $json = $jikan->Manga($i);
            var_dump($json);
        } catch (Exception $e) {
            echo '<script>';
            echo 'console.log(';
            echo 'Caught exception: ', $e->getMessage(); // "File does not exist" (the anime with this ID doesn't exist on MAL)
            echo ');';
        }
        sleep(3);
        echo $json->{'response'}['mal_id'];
        $anime = $json->{'response'};
        $characters = $anime['characters'];

        //variaveis
        $aired = NULL;
        $author = NULL;
        $dubla = NULL;
        $faz = NULL;
        $genre = NULL;
        $genre_manga = NULL;
        $genre_anime = NULL;
        $manga = NULL;
        $manga_author = NULL;
        $person = NULL;
        $personagem = NULL;

        $sql = "INSERT INTO aired VALUES(' " . $anime['aired']['from']. "','".  $anime['aired']['to'] . "')";
        if (!$db->query($sql)){
            echo '<script>';
            echo 'console.log(';
            echo "\"Erro na execução da query\"";
            echo ');';
            echo '</script>';
        }
        else {
            $aired = $db->insert_id;
        }

        $sql = "INSERT INTO author VALUES(' " . $manga['author']['name'] . "')";
        if (!$db->query($sql)){
            echo '<script>';
            echo 'console.log(';
            echo "\"Erro na execução da query\"";
            echo ');';
            echo '</script>';
        }
        else {
            $author = $db->insert_id;
        }

        //TODO: continuar

        $sql = "INSERT INTO genre VALUES(' " . $anime['author']['name'] . "')";
        if (!$db->query($sql)){
            echo '<script>';
            echo 'console.log(';
            echo "\"Erro na execução da query\"";
            echo ');';
            echo '</script>';
        }
        else {
            $genre = $db->insert_id;
        }

        $sql = "INSERT INTO manga VALUES(' " . $anime['author']['name'] . "')";
        if (!$db->query($sql)){
            echo '<script>';
            echo 'console.log(';
            echo "\"Erro na execução da query\"";
            echo ');';
            echo '</script>';
        }
        else {
            $manga = $db->insert_id;
        }

        $sql = "INSERT INTO faz VALUES(" . $person . ", ". $manga .")";
        if (!$db->query($sql)){
            echo '<script>';
            echo 'console.log(';
            echo "\"Erro na execução da query\"";
            echo ');';
            echo '</script>';
        }
        else {
            $faz = $db->insert_id;
        }


        $sql = "INSERT INTO anime VALUES(" .$anime['mal_id'] . ",'" .
        $anime['link_canonical'] . "','" . $anime['title'] . "','" .
        $anime['title_english'] . "','" . $anime['title_japanese'] . "','" .
        $anime['title_synonyms'] . "','" . $anime['image_url'] . "','" .
        $anime['type'] . "','" . $anime['source'] . "'," .
        $anime['episodes'] . ",'" . $anime['status'] . "','" .
        $anime['airing'] . "','" . $anime['aired_string'] . "'," .
        $aired . ",'" . $anime['duration'] . "','" .
        $anime['rating'] . "','" . $anime['score'] . "','" .
        $anime['scored_by'] . "','" . $anime['rank'] . "','" .
        $anime['popularity'] . "','" . $anime['members'] . "','" .
        $anime['favorites'] . "','" . $anime['synopsis'] . "','" .
        $anime['premiered'] . "','" . $anime['broadcast'] . "'," .
        $manga . ")";
        echo $sql;
        if (!$db->query($sql)){
            echo '<script>';
            echo 'console.log(';
            echo "Erro na execução da query";
            echo ');';
            echo '</script>';
        }
        else{
            $anime = $db->insert_id;
        }

        $sql = "INSERT INTO genre_manga VALUES(" . $manga . ", ". $genre .")";
        if (!$db->query($sql)){
            echo '<script>';
            echo 'console.log(';
            echo "\"Erro na execução da query\"";
            echo ');';
            echo '</script>';
        }
        else {
            $genre_manga = $db->insert_id;
        }

        $sql = "INSERT INTO genre_anime VALUES(" . $anime . ", ". $genre .")";
        if (!$db->query($sql)){
            echo '<script>';
            echo 'console.log(';
            echo "\"Erro na execução da query\"";
            echo ');';
            echo '</script>';
        }
        else {
            $genre_anime = $db->insert_id;
        }

        $sql = "INSERT INTO manga_author VALUES(" . $manga . ", ". $author .")";
        if (!$db->query($sql)){
            echo '<script>';
            echo 'console.log(';
            echo "\"Erro na execução da query\"";
            echo ');';
            echo '</script>';
        }
        else {
            $manga_author = $db->insert_id;
        }

        foreach ($characters as $crt){

            $sql = "INSERT INTO person VALUES(" . $anime["?"]  . ", ". $anime["?"] .")";
            if (!$db->query($sql)){
                echo '<script>';
                echo 'console.log(';
                echo "\"Erro na execução da query\"";
                echo ');';
                echo '</script>';
            }
            else {
                $person = $db->insert_id;
            }

            $sql = "INSERT INTO personagem VALUES(' " . $crt['name'] . "','" .
                $crt['name_kanji'] . "','" . $crt['nickname'] . "','" .
                $crt['about'] . "','" .  $crt['memberFavorites'] . "','" .
                $crt['img'] . "'," .  $anime . ")";
            if (!$db->query($sql)){
                echo '<script>';
                echo 'console.log(';
                echo "\"Erro na execução da query\"";
                echo ');';
                echo '</script>';
            }
            else {
                $personagem = $db->insert_id;
            }


            $sql = "INSERT INTO dubla VALUES(" . $person . ", ". $personagem .")";
            if (!$db->query($sql)){
                echo '<script>';
                echo 'console.log(';
                echo "\"Erro na execução da query\"";
                echo ');';
                echo '</script>';
            }
            else {
                $dubla = $db->insert_id;
            }

        }

    }
    $db->close();
    echo"<h3>Obrigado. Seus dados foram inseridos</h3> \n";
    echo'<p><a href="principal.php">Pagina inicial</a></p>' . "\n";
    ?>
     <button class="btn btn-lg btn-success" type="submit">Carregar</button>

</body></html>
