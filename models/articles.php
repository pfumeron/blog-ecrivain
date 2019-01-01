<?php

//select all articles based on status
function findAllArticles($articleStatus=null) {
    $db = dbConnect();
    
    if ($articleStatus) {
    	$articles = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date, article_status FROM articles WHERE article_status = ? ORDER BY creation_date DESC');
    	$articles->execute(array($articleStatus));
    } else {
    	$articles = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date, article_status FROM articles ORDER BY creation_date DESC');
    	$articles->execute();
    }

    return $articles;
}

function countArticles($articleStatus) {
	$db = dbConnect();
	$req = $db->prepare('SELECT COUNT(*) as count FROM articles WHERE article_status = ?');
	$req->execute(array($articleStatus));

    return $req->fetch();
}

//select published
function getArticles()
{
	try
	{
	    $bdd = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8', 'root', 'root');
	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}

	$req = $bdd->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date, article_status FROM articles ORDER BY creation_date DESC LIMIT 0, 5');

	return $req;
}

function getArticle($articleId)
{
    $db = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8', 'root', 'root');
    $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM articles WHERE id = ?');
    $req->execute(array($articleId));
    $article = $req->fetch();

    return $article;

}

function postArticle($title, $content)
{
	$db = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8', 'root', 'root');
    $draftArticle = $db->prepare('INSERT INTO articles(title, content, creation_date) VALUES(?, ?, NOW())');
    $draftArticle->execute(array($title, $content));	 
}

function validateArticle($articleId) 
{
    $db = dbConnect();
    $articleStatus = $db->prepare('UPDATE articles SET article_status = \'published\' WHERE id = ?');
    $articleStatus->execute(array($articleId));
}



