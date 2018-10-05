<html><head><title>Inserindo dados no banco</title></head>
<body>

<?php
    $db = new mysqli('localhost', 'root', '', 'api_mal');
    if ($db->connect_errno)
        echo "Erro na conexão com o banco de dados: " . $db->connect_error;
    require_once "../vendor/autoload.php"; // require your composer autoloader file wherever it is

    $jikan = new Jikan\Jikan;
    for ($i=1; $i<2; $i++){
        try {
            $json = $jikan->Anime(1, [CHARACTERS_STAFF]);

        } catch (Exception $e) {
            echo '<script>';
            echo 'console.log(';
            echo 'Caught exception: ', $e->getMessage(); // "File does not exist" (the anime with this ID doesn't exist on MAL)
            echo ');';
        }
        $anime = $json->{'response'};

        try {
            $json = $jikan->Manga($i);

        } catch (Exception $e) {
            echo '<script>';
            echo 'console.log(';
            echo 'Caught exception: ', $e->getMessage(); // "File does not exist" (the anime with this ID doesn't exist on MAL)
            echo ');';
        }
        sleep(3);
        $manga = $json->{'response'};
        $characters = $anime['character'];

        //variaveis
        $aired = NULL;
        $author = NULL;
        $dubla = NULL;
        $faz = NULL;
        $genre = $manga['genre'];
        $genre_manga = NULL;
        $genre_anime = NULL;
        $manga_author = NULL;
        $person = 1;
        $personagem = NULL;

        $sql = "INSERT INTO aired(aired_PK, date_from, date_to) VALUES(' " . $anime['aired']['from']. "','".  $anime['aired']['to'] . "')";
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

        $sql = "INSERT INTO author(authors_PK, name) VALUES(' " . $manga['author'][0]['name'] . "')";
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

        $sql = "INSERT INTO manga(id,	img,	volume,	chapter,	status,	score,	rating	,popularity,members,favorites,description,synopsys,title,title_eng,title_jap,type,is_publishing,published,scored_by,rank,broadcast) VALUES("
            . $manga['mal_id'] . ",'"
            . $manga['image_url'] . "',' "
            . $manga['volumes'] . "',' "
            . $manga['chapters'] . "',' "
            . $manga['status'] . "',' "
            . $manga['score'] . "', NULL ,' "
            . $manga['popularity'] . "',' "
            . $manga['members'] . "',' "
            . $manga['favorites'] . "',\" "
            . $manga['synopsis'] . "\",NULL,' "
            . $manga['title']. "',' "
            . $manga['title_english'] . "',' "
            . $manga['title_japanese'] . "',' "
            . $manga['type'] . "', '"
            . $manga['publishing'] . "',' "
            . $manga['published_string'] . "', '"
            . $manga['scored_by'] . "',' "
            . $manga['rank'] .  "', NULL);";
        if (!$db->query($sql)){
            echo '<script>';
            echo 'console.log(';
            echo "\"Erro na execução da query manga\"";
            echo ');';
            echo '</script>';
            $manga = 1;
        }
        else {
            $manga = $db->insert_id;
        }
        $sql = "INSERT INTO faz(FK_Person_id,FK_Manga_id) VALUES(" . $person . ", ". $manga .");";
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


        $sql = "INSERT INTO anime(Id,link_canonical,title,title_eng,title_jap,img_url,type,source_type,episodes,status,airing,aired_string,FK_aired_aired_PK,duration,rating,score,scored_by,rank,popularity,members,favorites,synopses,premiered,broadcast,FK_Manga_id) VALUES(" .$anime['mal_id'] . ",'" .
        $anime['link_canonical'] . "',\"" . $anime['title'] . "\",\"" .
        $anime['title_english'] . "\",'" . $anime['title_japanese'] . "','"
        . "','" . $anime['image_url'] . "','" .
        $anime['type'] . "','" . $anime['source'] . "'," .
        $anime['episodes'] . ",'" . $anime['status'] . "','" .
        $anime['airing'] . "','" . $anime['aired_string'] . "'," .
        $aired . ",'" . $anime['duration'] . "','" .
        $anime['rating'] . "','" . $anime['score'] . "','" .
        $anime['scored_by'] . "','" . $anime['rank'] . "','" .
        $anime['popularity'] . "','" . $anime['members'] . "','" .
        $anime['favorites'] . "',\"" . str_replace('"', '\"', $anime['synopsis']) . "\",'" .
        $anime['premiered'] . "','" . str_replace('"', '\"', $anime['broadcast']) . "\"," .
        $manga . ");";
        if (!$db->query($sql)){
            echo '<script>';
            echo 'console.log(';
            echo "\"Erro na execução da query anime\"";
            echo ');';
            echo '</script>';
            echo $sql;
        }
        else{
            $anime = $db->insert_id;
        }
        echo "</br></br>";
        foreach ($genre as $gn){
            $sql = "INSERT INTO genre(nome) VALUES(' " . $gn['name'] . "')";
            if (!$db->query($sql)){
                echo '<script>';
                echo 'console.log(';
                echo "\"Erro na execução da query\"";
                echo ');';
                echo '</script>';
            }
            else {
                $gen = $db->insert_id;
            }
            $sql = "INSERT INTO genre_manga(FK_manga_id,FK_genre_id) VALUES(" . $manga . ", ". $gen .");";
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
        }
        foreach ($genre as $gn){
            $sql = "INSERT INTO genre(nome) VALUES(' " . $gn['name'] . "')";
            if (!$db->query($sql)){
                echo '<script>';
                echo 'console.log(';
                echo "\"Erro na execução da query\"";
                echo ');';
                echo '</script>';
            }
            else {
                $gen = $db->insert_id;
            }
            $sql = "INSERT INTO genre_anime(FK_anime_id	,FK_genre_id) VALUES(" . $anime. ", ". $gen .");";
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
        }

        $sql = "INSERT INTO manga_author(	FK_manga_id,	FK_author_id) VALUES(" . $manga . ", ". $author .");";
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

            $sql = "INSERT INTO person(	image,	name,	givenName	,familyName	,alternativeNames,	birthday,	memberFavorites,	about) VALUES('" . $crt["voice_actor"][0]['name'] .
                "','" .$crt["voice_actor"][0]['img_url'] ."');";
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

            $sql = "INSERT INTO personagem(name,	name_kanji,	nickname,	about	,memberFavorites,	img	FK_Manga_id,	FK_Anime_Id) VALUES(' " . $crt['name'] . "','" .
                $crt['name_kanji'] . "','" . $crt['nickname'] . "','" .
                $crt['about'] . "','" .  $crt['memberFavorites'] . "','" .
                $crt['url_img'] . "',Null, " .  $anime . ")";
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


            $sql = "INSERT INTO dubla(	FK_Person_id, FK_Personagem_id) VALUES(" . $person . ", ". $personagem .");";
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
    ?>
     <button class="btn btn-lg btn-success" type="submit">Carregar</button>

</body></html>
