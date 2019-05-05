<?php
require_once('models/index.php');

// HOMEPAGE VIEW

function listAllArticles() {
	$articles = Article::findAll('publié');
	require('views/blog/allArticles.php');
}

// VIEW ALL ARTICLES LIST

function listArticles()
{
	$articles = Article::getLatest();
	require('views//blog/home.php');
}

// VIEW ARTICLE PAGE WITH VALIDATED COMMENTS

function listArticleAndComment($articleId)
{
    $article = Article::get($articleId);
    $comments = Comment::get($articleId,'validated','all');
    require('views/blog/articleView.php');
}

// ADD COMMENT ON ARTICLE PAGE

function addComment($articleId, $author, $comment)
{
    $affectedLines = Comment::post($articleId, $author, $comment);

    if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        header("Location: ".getenv('HOSTNAME')."/index.php?action=thankYou");
    }
}

// THANK YOU PAGE

function thankYouView() {
	require('views/blog/thankyou.php');
}

// FLAG COMMENT ON A ARTICLE

function alertComment($articleId){
	Comment::flag($articleId);
	header("Location: ".getenv('HOSTNAME')."/index.php?action=getArticle&id=" . $_GET['articleId']);
}