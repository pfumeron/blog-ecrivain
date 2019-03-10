<?php

require_once('models/articles.php');
require_once('models/admin.php');


// ADMIN DASHBOARD PAGES VIEWS

function loginView() {
	require('views/blog/login.php');
}

function login($email, $password){
	$adminlogged = logAdmin($_POST['email'],$_POST['password']);
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
	$articles = getArticlesAdmin($articleStatus);
	$nbPublishedArticles = countArticles('publié');
	$nbDraftArticles = countArticles('brouillon');
	$nbTotalArticles = $nbPublishedArticles['count'] + $nbDraftArticles['count'];

	require('views/admin/articleView.php');
}

function showArticleWithComments() {
	$article = getArticle($_GET['id']);
	$comments = getComments($_GET['id'],'under_review');
	require('views/admin/pageViewComments.php');
}

// COMMENTS ADMINISTRATION

function validComment(){
	updateComment($_GET['id']);
	header("Location: http://localhost:8888/projet_4/index.php?action=adminGetArticle&id=" . $_GET['articleId']);
}

function deleteComment(){
	removeComment($_GET['id']);
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

function publishArticle(){
	validateArticle($_GET['id']);
	header('Location: http://localhost:8888/projet_4/index.php?action=adminArticles');
}

function deleteArticle() {
	removeArticle($_GET['id']);
	header('Location: http://localhost:8888/projet_4/index.php?action=adminArticles');
}

function editArticle() {
	$article = getArticle($_GET['id']);
	require('views/admin/editArticle.php');
}

function updateArticle() {
	updateArticles($_GET['id'], ['title' => $_POST['title'], 'content' => $_POST['content']]);
	header('Location: http://localhost:8888/projet_4/index.php?action=adminArticles');
}

?>