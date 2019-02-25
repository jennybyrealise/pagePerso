<?php

class Photo{
    private $id;
    private $id_article;
    private $photo;
    
    public function __set($name,$value){
    }

    public function getId(){
        return $this->id;
    }
    public function getIdArticle(){
        return $this->id_article;
    }
    public function getPhoto(){
        return $this->photo;
    }
    
}
?>