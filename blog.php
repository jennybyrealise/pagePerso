<?php
    require "connexion.php";
    $appli = new Connexion();

    //récupération de l'article dans BDD
    $listeArticle = $appli->getAllArticle();

    include "header.php";

?>

<title >blog</title>

<link rel="stylesheet" href="commun.css">



    <div class="container-fluid">

       

        <h1 class="titre">Portfolio</h1>

        <br>
        <br>

        <p class="citation text-center"><strong><em>"L'informatique est trop importante pour être laissée aux hommes"</em></strong></P>
        <p class="citation text-center"><em>Karen Spärck Jones</em></P>
 
        <!--article de mini-facebook -->
        <div id="article" >
            
        
        <?php

        /*initialisation à 0*/
        $nbr=0;

        foreach ($listeArticle as $article){ 
            echo '<div class="row">';
            echo '<div id="texteArticle" class="gallerie col-lg-6">';
            echo '<p id="sous-titre"><strong>'.$article->getTitre().'</strong><p>'.'<br>';
            echo '<p>'.$article->getTexteArticle().'</p>'.'<br>';
            echo '<a href= "'. $article->getLien() .'">'. $article->getLien() .'</a>';
            echo '<p>'.$article->getDateParutionArticle().'</p>';
            echo '</div>';
            /*récupère les photos par l'id de l'article*/
            $photos = $appli->getAllPhotos($article->getId());
            /*créer une variable $id qui permet d'avoir plusieurs caroussels dans le foreach */
            $id = "carousel" . $nbr;
            $nbr++;

        ?>

                <!--caroussel de mini-facebook --> 
                <div class="gallerie col-lg-6" >
                <div id="<?php echo $id ?>" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">

                    <?php foreach ($photos as $index => $photo) {  ?>
                    
                    <div class="carousel-item <?php if ($index === 0) echo "active";?>">
                            <img src="<?php echo $photo->getPhoto();?>" class="photoArticle d-block w-30 " 
                            alt="photo de la page personnel de mini-facebook">
                        </div>

                    <?php }  ?>
            
                    <a class="carousel-control-prev" href="#<?php echo $id ?>" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#<?php echo $id ?>" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    </div>
            	
                </div>
                </div>
        </div>


                 <!--texte area --> 
                <form id="submit" method="post" action="submitCommentaire.php">
                    <section class="well">
                        <div class="form-group">
                            <label for="comment"  class="text-left">
                                Commentaire:
                            </label>

                    <textarea name="texteCommentaire" type="text" class="form-control" wrap="hard"  rows="3" id="comment" required></textarea>

                        <input type="hidden" name="id_article" value="<?php echo $article->getId() ?>">

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">
                                Valider
                            </button>
                        </div>
                    </div>
                </form>

                            <!--texte area <div style = "max-height:500px; overflow:scroll;">--> 





                    <?php $listeCommentaire = $appli->getAllCommentaire($article->getId());
                    
                    foreach ($listeCommentaire as $commentaire){

                    echo '<div class="input-group">
                            <p>' . $commentaire->getTexteCommentaire() . '</br>
                            </p>
                        </div>

                        <div class="text-right">
                            <p>' . $commentaire->getDateParutionCommentaire() . '</br>
                            </p>
                        </div>';
                    }
                    ?>
        <?php } ?>
        </div> 
          
    
    </div>
        

<?php

include "footer.php";

?>
  