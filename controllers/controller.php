<?php
require_once('models/index.php');

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

function listArticleAndComment($articleId)
{
    $article = getArticle($articleId);
    $comments = getComments($articleId,'validated');
    require('views/blog/articleView.php');
}

// ADD COMMENT ON ARTICLE PAGE

function addComment($articleId, $author, $comment)
{
    $affectedLines = postComment($articleId, $author, $comment);

    if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: http://localhost:8888/projet_4/index.php?action=thankYou');
    }
}

// THANK YOU PAGE

function thankYouView() {
	require('views/blog/thankyou.php');
}

// FLAG COMMENT ON A ARTICLE

function alertComment($articleId){
	flagComment($articleId);
	header("Location: http://localhost:8888/projet_4/index.php?action=getArticle&id=" . $_GET['articleId']);
}