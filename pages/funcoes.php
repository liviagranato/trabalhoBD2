<?php

function buscar($nome, $tabela){

    if ($tabela ==='personagem' || $tabela==='person'){
        $campo = 'name';
    } else {
        $campo = 'title';
    }
    $conn = new mysqli('localhost', 'root', '', 'api_mal');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM $tabela WHERE $campo LIKE '%$nome%'";
    $result = $conn->query($sql);
    $num_registros=0;
    ob_end_clean();
    if ($tabela==='personagem' || $tabela==='person') {
        if ($result->num_rows > 0) {
            $aux = ($result->num_rows) / 4;
            echo '<div class="container">';
            for ($i = 0; $i < $aux; $i++) {
                echo '<div class="row">';
                while ($row = $result->fetch_assoc()) {
                    $titulo = $row['name'];
                    if($tabela ==='personagem'){
                        $url_img = $row['img'];
                        echo
                            '<div class="col-sm-3">
                        <div class="card card-imagem" onclick="window.location.href=\'personagem_detalhes.php\'">
                            <img class="card-img" data-src="holder.js/100px260/" alt="100%x260" src="' . $url_img . '">
                            <div class="div-titulo"><p class="titulo">' . $titulo . '</p></div>
                    </div>
                </div>';
                    }
                    if($tabela ==='person'){
                        $url_img = $row['image'];
                        echo
                            '<div class="col-sm-3">
                        <div class="card card-imagem" onclick="window.location.href=\'pessoa_detalhes.php\'">
                            <img class="card-img" data-src="holder.js/100px260/" alt="100%x260" src="' . $url_img . '">
                            <div class="div-titulo"><p class="titulo">' . $titulo . '</p></div>
                    </div>
                </div>';
                    }

                    $num_registros++;
                    if ($num_registros == 20) break;
                }
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo '<h3>Resultado não encontrado!</h3> ';
        }
    } else {
        if ($result->num_rows > 0) {
            $aux = ($result->num_rows) / 4;
            echo '<div class="container">';
            for ($i = 0; $i < $aux; $i++) {
                echo '<div class="row">';
                while ($row = $result->fetch_assoc()) {
                    $titulo = $row['title'];
                    if ($tabela === 'manga'){
                        $url_img = $row['img'];
                        echo
                            '<div class="col-sm-3">
                        <div class="card card-imagem" onclick="window.location.href=\'manga_detalhes.php\'">
                            <img class="card-img" data-src="holder.js/100px260/" alt="100%x260" src="' . $url_img . '">
                            <div class="div-titulo"><p class="titulo">' . $titulo . '</p></div>
                        </div>
                        </div>';
                    }
                    if ($tabela === 'anime'){
                        $url_img = $row['img_url'];
                        echo
                            '<div class="col-sm-3">
                        <div class="card card-imagem" onclick="window.location.href=\'anime_detalhes.php\'">
                            <img class="card-img" data-src="holder.js/100px260/" alt="100%x260" src="' . $url_img . '">
                            <div class="div-titulo"><p class="titulo">' . $titulo . '</p></div>
                        </div>
                        </div>';
                    }
                    $num_registros++;
                    if ($num_registros == 20) break;
                }
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo '<h3>Resultado não encontrado!</h3> ';
        }
    }
}