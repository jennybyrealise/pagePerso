<?php

require "connexion.php";


$appli = new Connexion();


$texteCommentaire = $_POST["texteCommentaire"];

$dateParutionCommentaire = date("Y-m-d");

$id_article = $_POST["id_article"];

$insertCommentaire = $appli->insertCommentaire($id_article,$texteCommentaire, $dateParutionCommentaire);

header ("Location:blog.php");
exit();
?>
