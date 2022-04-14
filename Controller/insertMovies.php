<?php
    session_start();

    require '../Model/Filmes.php';
    $msg = "";
    $filme = new Filmes();

    $title = $_POST['title'];
    $sinopse = $_POST['sinopse'];
    $nota = $_POST['nota'];
    $poster = $_POST['poster'];

    $filme->setTitle($title);
    $filme->setSinopse($sinopse);
    $filme->setNota($nota);
    $filme->setPoster($poster);

    $upload = $filme->savePoster($_FILES);

    if(gettype($upload)=="string"){
        $filme->setPoster($upload);
    }
    
    if($filme->salvar() ){
        $_SESSION["msg"] = "Filme cadstrado com sucesso";
    }else{
        $_SESSION["msg"] = "Erro ao cadastrar o filme, verifique os campos";
    }
    header("Location: /Clorocine")
?>
    
