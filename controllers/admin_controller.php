<?php

require_once('models/articles.php');


function adminIndex(){
	$articles = getArticles();
	$comments = findAllComments('under_review');

	require('views/admin_index.php');
}

function adminArticlesView(){
	$articlesUnderReview = findAllArticles('under_review');
	$articlesValidated = findAllArticles('validated');

	require('views/admin_articleView.php.');
}

function AdminListComments(){
	$validatedComments = findAllComments('validated');
	$underReviewComments = findAllComments('under_review');

	require('views/admin_commentsView.php');
}

function validComment(){
	updateComment($_GET['id']);
	header('Location: http://localhost:8888/projet_4/index.php?action=admin');
}

function deleteComment(){
	removeComment($_GET['id']);
	header('Location: http://localhost:8888/projet_4/index.php?action=admin');
}

function createArticle($title, $content){
	postArticle($title, $content);
	header('Location: http://localhost:8888/projet_4/index.php?action=admin');
}

function adminArticles(){
	$articles = getArticles();
	require('views/admin_articleView.php');
}

function publishArticle(){
	validateArticle($_GET['id']);
	header('Location: http://localhost:8888/projet_4/index.php?action=adminArticles');
}

?>