<?php
    $pagina = filter_input(INPUT_GET, 'p');

    if ($pagina == '' || empty($pagina) || $pagina == 'index' || $pagina == 'index.php') {
        include_once 'view/galeria.php';
    } else {
        if (file_exists("view/" . $pagina . '.php')) {
            include_once "view/" . $pagina . '.php';
        } else {
            include_once 'view/404.php';
        }
    }
?>