<?php
 
function logAdmin($email,$password) {
	$db = dbConnect();
	$admin = $db->prepare('SELECT email, password FROM admin WHERE email = ? AND password = ?');
	$admin->execute(array($email,$password));

    return $admin->fetch();
}

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

	$req = $bdd->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date, article_status FROM articles ORDER BY creation_date DESC LIMIT 0, 7');

	return $req;
}

function getArticlesAdmin()
{
	try
	{
	    $bdd = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8', 'root', 'root');
	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}

	$req = $bdd->query('SELECT a.id, a.title, a.content, DATE_FORMAT(a.creation_date, \'%d/%m/%Y\') AS creation_date, a.article_status, SUM( CASE WHEN c.status = \'under_review\' THEN 1 ELSE 0 END) AS nbNewComment, COUNT(c.id) as nbTotalComments FROM articles as a LEFT JOIN comments as c ON a.id = c.article_id GROUP BY a.id ORDER BY creation_date DESC LIMIT 0, 5');

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
    $articleStatus = $db->prepare('UPDATE articles SET article_status = \'publié\' WHERE id = ?');
    $articleStatus->execute(array($articleId));
}

function updateArticles($articleId, $values) {
	$db = dbConnect();
	$modifiedArticle = $db->prepare('UPDATE articles SET title = ?, content = ? WHERE id = ? ');
	$modifiedArticle->execute(array($values['title'], $values['content'],  $articleId));
}

function removeArticle($articleId)
{
    $db = dbConnect();
    $comments = $db->prepare('DELETE FROM articles WHERE id = ?');
    $comments->execute(array($articleId));
}



