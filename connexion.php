<?php

require "classArticle.php";
require "classCommentaire.php";
require "classPhoto.php";

class Connexion{

    //initialisation paramètre de connection
    //try-catch récupère les errreurs
    private $connexion;
    
    public function __construct(){
        $PARAM_hote = "localhost";
        $PARAM_port = "3306";
        $PARAM_nom_bd = "PagePerso";
        $PARAM_utilisateur = "adminPagePerso";
        $PARAM_mot_passe = "P@gePers0";

        try{
            $this->connexion = new PDO (
                "mysql:host=".$PARAM_hote.";dbname=".$PARAM_nom_bd,
                $PARAM_utilisateur,
                $PARAM_mot_passe
            );
            $this->connexion->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND,"SET NAMES 'utf8'");
        }catch(Exception $e){
            echo "Erreur:".$e -> getMessage()."<br>";
            echo "N°:".$e -> getCode();
        }
      
    }
    
    //récupération de la connexion
    public function getConnexion(){
        return $this->connexion;
    }

    /* Insertion d'article  */
    public function insertArticle($titre, $photo,$texteArticle, $dateParurationArticle) {

        $requete_prepare = $this->connexion->prepare(
        "INSERT INTO article (titre, photo, texte, dateParution) 
            VALUES (:titre,:photo,:texteAricle,:dateParutionArticle)");
        
        $requete_prepare->execute(
        array('titre' => $titre, 
            'photo' => $photo,
            'texteArticle' => $texteArticle, 
            'dateParutionArticle' => $dateParutionArticle)
        );
        $id = $this->connexion->lastInsertId();
    }


    // Fonction d'insertion d'un nouveau commentaire.
    public function insertCommentaire($id_article,$texteCommentaire, $dateParutionCommentaire) {

        $requete_prepare = $this->connexion->prepare(
            "INSERT INTO commentaire (id_article,texte, dateParution)
            VALUES (:id_article,:texteCommentaire, :dateParutionCommentaire)"
            );

        $requete_prepare->execute(
            array('id_article'=>$id_article,
                'texteCommentaire'=>$texteCommentaire,
                'dateParutionCommentaire'=>$dateParutionCommentaire)
               
            );
    }

    // Fonction d'insertion de nouveau Chien.
    public function insertphoto($id_article, $photo) {

        $requete_prepare = $this->connexion->prepare(
            "INSERT INTO photo
            (id_article, photo)
            VALUES
            (:id_article,:photo)");
            
        $requete_prepare->execute(
            array('id_article' => $id_article,
                'photo' => $photo));

        $id = $this->connexion->lastInsertId();

        return $id;
    }

      //récupération l'article par son id
      public function getArticle($id){
        $requete_prepare = $this->connexion->prepare(
            "SELECT a.id,a.titre,a.texte as texteArticle,a.lien,a.dateParution as dateParutionArticle
            FROM article a
            WHERE a.id = :idArticle");

        $requete_prepare->execute(array("idArticle" => $id));
        $article = $requete_prepare->fetchObject('Article');
            
        return $article;
    }

 
    //récupération tous les articles
    public function getAllArticle(){
        $requete_prepare = $this->connexion->prepare(
            "SELECT a.id, a.titre, a.texte as texteArticle,a.lien,a.dateParution as dateParutionArticle
            FROM article a");
            
        $requete_prepare->execute();
        $listeArticle = $requete_prepare->fetchAll(PDO::FETCH_CLASS,'Article');
            
        return $listeArticle;
    }

   //récupération des photos de l'article
    public function getAllPhotos($id_article) {

        $requete_prepare = $this->connexion->prepare(
            "SELECT a.id,
            p.id_article,
            p.photo 
            FROM article a
            INNER JOIN photo p 
            ON p.id_article = a.id
            WHERE a.id = :id_article");

        $requete_prepare->execute(
            array("id_article" => $id_article));

        $photo = $requete_prepare->fetchALL(PDO::FETCH_CLASS, "Photo");

        return $photo;
    }

    //récupération de tous les comentaire de l'article
    public function getAllCommentaire($id_article){
        $requete = $this->connexion->prepare(
           "SELECT DISTINCT c.id,c.id_article,c.texte AS texteCommentaire,c.dateParution as dateParutionCommentaire,
                   a.id,a.titre,a.texte as texteArticle,a.dateParution as dateParutionArticle
            FROM commentaire c
            INNER JOIN article a
            ON c.id_article = a.id
            WHERE c.id_article = :id
            ORDER BY c.id DESC");
            $requete->execute(array("id" => $id_article));

             $listecommentaire = $requete->fetchAll(PDO::FETCH_CLASS, "Commentaire");
 
            return $listecommentaire;
    }














}