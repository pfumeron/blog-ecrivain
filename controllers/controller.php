<?php
require_once('models/articles.php');
require_once('models/comments.php');

// HOMEPAGE VIEW

function listAllArticles() {
	$articles = findAllArticles('publié');
	require('views/blog/allArticles.php');
}

// VIEW ALL ARTICLES LIST

function listArticles()
{
	$articles = getArticles();
	require('views//blog/home.php');
}

// VIEW ARTICLE PAGE WITH VALIDATED COMMENTS

function listArticleAndComment()
{
	if (isset($_GET['id']) && $_GET['id'] > 0) {
	    $article = getArticle($_GET['id']);
	    $comments = getComments($_GET['id'],'validated');
	    require('views/blog/articleView.php');
	}
	else {
	    echo 'Erreur : aucun identifiant de billet envoyé';
	}
}

// ADD COMMENT ON ARTICLE PAGE

function addComment($articleId, $author, $comment)
{
    $affectedLines = postComment($articleId, $author, $comment);

    if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: views/blog/thankyou.php');
    }
}