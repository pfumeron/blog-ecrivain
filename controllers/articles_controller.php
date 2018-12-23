<?php
require('articles.php');
require('comments.php');

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $article = getArticle($_GET['id']);
    $comments = getComments($_GET['id']);
    require('articleView.php');
}
else {
    echo 'Erreur : aucun identifiant de billet envoyé';
}

