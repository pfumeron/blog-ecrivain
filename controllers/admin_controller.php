<?php

require_once('models/articles.php');

function adminIndex(){
	$articles = getArticlesAdmin();
	require('views/admin_index.php');
}

function login($email, $password){
	$adminlogged = logAdmin($_POST['email'],$_POST['password']);
	if ($adminlogged) {
		header('Location: http://localhost:8888/projet_4/index.php?action=admin');
	} else {
		header('Location: http://localhost:8888/projet_4/index.php?action=login');
	}
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

function deleteArticle() {
	removeArticle($_GET['id']);
	header('Location: http://localhost:8888/projet_4/index.php?action=adminArticles');
}

function createArticle($title, $content){
	postArticle($title, $content);
	header('Location: http://localhost:8888/projet_4/index.php?action=adminArticles');
}

function postNewArticle() {
	require('views/admin_createArticle.php');
}

function adminArticles(){
	$articles = findAllArticles();
	$nbPublishedArticles = countArticles('publié');
	$nbDraftArticles = countArticles('brouillon');
	$nbTotalArticles = $nbPublishedArticles['count'] + $nbDraftArticles['count'];

	require('views/admin_articleView.php');
}

function publishArticle(){
	validateArticle($_GET['id']);
	header('Location: http://localhost:8888/projet_4/index.php?action=adminArticles');
}

function editArticle() {
	$article = getArticle($_GET['id']);
	require('views/admin_editArticle.php');
}

function updateArticle() {
	updateArticles($_GET['id'], ['title' => $_POST['title'], 'content' => $_POST['content']]);
	header('Location: http://localhost:8888/projet_4/index.php?action=adminArticles');
}

?>