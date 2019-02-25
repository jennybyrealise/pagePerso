<?php

class Article{
    private $id;
    private $titre;
    private $texteArticle;
    private $lien;
    private $dateParutionArticle;
    
    public function __set($name,$value){
    }

    public function getId(){
        return $this->id;
    }
    public function getTitre(){
        return $this->titre;
    }
    public function getTexteArticle(){
        return $this->texteArticle;
    }
    public function getLien(){
        return $this->lien;
    }
    public function getDateParutionArticle(){
        return $this->dateParutionArticle;
    }
}
?>