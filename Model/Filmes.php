<?php

require 'Conectar.php';
class Filmes {
    private $id;
    private $title;
    private $poster;
    private $sinopse;
    private $nota;
    private $con;

    function getId() {
        return $this->id;
    }
    function getTitle() {
        return $this->title;
    }
    function getPoster() {
        return $this->poster;
    }
    function getSinopse() {
        return $this->sinopse;
    }
    function getNota() {
        return $this->nota;
    }
    function setId($id) {
        $this->id = $id;
    }
    function setTitle($title) {
        $this->title = $title;
    }
    function setPoster($poster){
        $this->poster = $poster;
    }
    function setSinopse($sinopse) {
        $this->sinopse = $sinopse;
    }
    function setNota($nota){
        $this->nota = $nota;
    }
    function salvar() {
        try {
            $this->con = new Conectar();
            $sql = $this->con->prepare("INSERT INTO filmes VALUES (null, ?, ?, ?, ?)");
            $sql->bindValue(1, $this->title, PDO::PARAM_STR);
            $sql->bindValue(2, $this->poster, PDO::PARAM_STR);
            $sql->bindValue(3, $this->sinopse, PDO::PARAM_STR);
            $sql->bindValue(4, $this->nota, PDO::PARAM_STR);
            
            if($sql->execute() == 1){
                return TRUE;
            }else{
                return FALSE;
            }
            
        } catch (PDOException $exc) {
            echo "Erro ao salvar " . $exc->getMessage();
        }
    }//salvar
    function consultar() {
        try {
            $this->con = new Conectar();
            $sql = $this->con->prepare("SELECT * FROM filmes");
                        
            if($sql->execute() == 1){
                return $sql->fetchAll();
            }else{
                return false;
            }            
        } catch (PDOException $exc) {
            echo "Erro ao consultar " . $exc->getMessage();
        }
    }//consultar
    function consultarPorId() {
        try {
            $this->con = new Conectar();
            $sql = $this->con->prepare("SELECT * FROM filmes WHERE id = ?");
            $sql->bindValue(1, $this->id, PDO::PARAM_INT);
            
            return $sql->execute() == 1 ? $sql->fetchAll() : false;
                                   
        } catch (PDOException $exc) {
            echo "Erro ao consultar " . $exc->getMessage();
        }
    }//consultar copiado
     function savePoster($file){
        $posterDir = "../assets/image/posters/";
        $posterPath = $posterDir . basename($file["poster_file"]["name"]);
        $posterTmp = $file['poster_file']["tmp_name"];
        if(move_uploaded_file($posterTmp, $posterPath)){
            $pathCorrect = substr($posterPath, 1);
            return $pathCorrect;
        }else{
            return false;
        }
    }
}

//fim class