<?php

require_once('models/articles.php');

function listArticles()
{
	$articles = getArticles();
	require('views/home.php');
}

require('models/comments.php');


function listComments()
{
	$comments = getComments($_GET['id'],'validated');
	require('views/commentView.php');
}


function listArticleAndComment()
{
	if (isset($_GET['id']) && $_GET['id'] > 0) {
	    $article = getArticle($_GET['id']);
	    $comments = getComments($_GET['id'],'validated');
	    require('views/articleView.php');
	}
	else {
	    echo 'Erreur : aucun identifiant de billet envoyé';
	}
}


function addComment($articleId, $author, $comment)
{
    $affectedLines = postComment($articleId, $author, $comment);

    if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: views/thankyou.php');
    }
}