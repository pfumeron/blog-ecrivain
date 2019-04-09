<?php

require_once('models/index.php');


// ADMIN DASHBOARD PAGES VIEWS

function loginView() {
	require('views/blog/login.php');
}

function login($email, $password){
	$adminlogged = logAdmin($email,$password);
	if (isset($adminlogged)) {
        session_start();
        $_SESSION['id'] = $adminlogged['id'];
        
		header('Location: http://localhost:8888/projet_4/index.php?action=adminArticles');
	} else {
    	echo 'Mauvais identifiant ou mot de passe !';
		header('Location: http://localhost:8888/projet_4/index.php?action=login');
	}
}

function adminArticles($articleStatus=null){
	$articles = Article::findAll($articleStatus);
	$nbPublishedArticles = Article::count('publié');
	$nbDraftArticles = Article::count('brouillon');
	$nbTotalArticles = $nbPublishedArticles + $nbDraftArticles;

	require('views/admin/articleView.php');
}

function showArticleWithComments($articleId) {
	$article = getArticle($articleId);
	$comments = getComments($articleId,'under_review');
	require('views/admin/pageViewComments.php');
}

// COMMENTS ADMINISTRATION

function validComment($articleId){
	updateComment($articleId);
	header("Location: http://localhost:8888/projet_4/index.php?action=adminGetArticle&id=" . $_GET['articleId']);
}

function deleteComment($articleId){
	removeComment($articleId);
	header("Location: http://localhost:8888/projet_4/index.php?action=adminGetArticle&id=" . $_GET['articleId']);
}

// ARTICLES ADMINISTRATION

function newArticle() {
	require('views/admin/createArticle.php');
}

function createArticle($title, $content){
	postArticle($title, $content);
	header('Location: http://localhost:8888/projet_4/index.php?action=adminArticles');
}

function publishArticle($articleId){
	validateArticle($articleId);
	header('Location: http://localhost:8888/projet_4/index.php?action=adminArticles');
}

function deleteArticle($articleId) {
	removeArticle($articleId);
	header('Location: http://localhost:8888/projet_4/index.php?action=adminArticles');
}

function editArticle($articleId) {
	$article = getArticle($articleId);
	require('views/admin/editArticle.php');
}

function updateArticle() {
	updateArticles($_GET['id'], ['title' => $_POST['title'], 'content' => $_POST['content']]);
	header('Location: http://localhost:8888/projet_4/index.php?action=adminArticles');
}

?>