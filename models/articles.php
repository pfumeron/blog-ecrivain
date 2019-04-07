<?php

class Article {
    public $id;
    public $title;
    public $content;
    public $creation_date;
    public $article_status;

    static function getLatest() // DISPLAY ARTICLES ON MAIN HOMEPAGE
    {
        $db = dbConnect();
        $articles = $db->query('SELECT a.id, a.title, a.content, DATE_FORMAT(a.creation_date, \'%d/%m/%Y\') AS creation_date, a.article_status FROM articles AS a WHERE article_status = \'publié\' ORDER BY a.creation_date DESC LIMIT 0, 4');
        
        $obj_articles = [];

        while ($data = $articles->fetch()) {

            $new_obj_article = new Article();

            $new_obj_article->id = $data['id'];
            $new_obj_article->title = $data['title'];
            $new_obj_article->content = $data['content'];
            $new_obj_article->creation_date = $data['creation_date'];
            $new_obj_article->article_status = $data['article_status'];

            array_push($obj_articles, $new_obj_article);
        }
        $articles->closeCursor();

        return $obj_articles;
    }

    static function findAll($articleStatus=null) {
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

}



// DISPLAY ALL ARTICLES  

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

// DISPLAY SPECIFIC ARTICLE PAGE ON BLOG

function getArticle($articleId) {
    $db = dbConnect();
    $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM articles WHERE id = ?');
    $req->execute(array($articleId));
    $article = $req->fetch();

    return $article;
}

// DISPLAY ARTICLES ON THE ADMIN

function getArticlesAdmin($articleStatus=null) {
	$db = dbConnect();
	if ($articleStatus) {
    	$articles = $db->prepare('SELECT a.id, a.title, a.content, DATE_FORMAT(a.creation_date, \'%d/%m/%Y\') AS creation_date, a.article_status, SUM( CASE WHEN c.status = \'under_review\' THEN 1 ELSE 0 END) AS nbNewComment, COUNT(c.id) as nbTotalComments FROM articles as a LEFT JOIN comments as c ON a.id = c.article_id WHERE a.article_status = ? GROUP BY a.id ORDER BY a.creation_date DESC');
    	$articles->execute(array($articleStatus));

    } else {
    	$articles = $db->query('SELECT a.id, a.title, a.content, DATE_FORMAT(a.creation_date, \'%d/%m/%Y\') AS creation_date, a.article_status, SUM( CASE WHEN c.status = \'under_review\' THEN 1 ELSE 0 END) AS nbNewComment, COUNT(c.id) as nbTotalComments FROM articles as a LEFT JOIN comments as c ON a.id = c.article_id GROUP BY a.id ORDER BY a.creation_date DESC');
    }

	return $articles;
}

function countArticles($articleStatus) {
    $db = dbConnect();
    $articles = $db->prepare('SELECT COUNT(*) as count FROM articles WHERE article_status = ?');
    $articles->execute(array($articleStatus));

    return $articles->fetch();
}

function getArticleAndComment($articleId) {
    $db = dbConnect();
    $articles = $db->prepare('SELECT a.id, a.title, a.content, DATE_FORMAT(a.creation_date, \'%d/%m/%Y\') AS creation_date_fr, c.comment, c.author, c.status, DATE_FORMAT(c.comment_date, \'%d/%m/%Y\') AS comment_date FROM articles as a LEFT JOIN comments as c ON a.id = c.article_id WHERE a.id = ?');
    $articles->execute(array($articleId));
    return $articles->fetch();
}

function postArticle($title, $content) {
	$db = dbConnect();
    $draftArticle = $db->prepare('INSERT INTO articles(title, content, creation_date) VALUES(?, ?, NOW())');
    $draftArticle->execute(array($title, $content));	 
}

function validateArticle($articleId) {
    $db = dbConnect();
    $articleStatus = $db->prepare('UPDATE articles SET article_status = \'publié\' WHERE id = ?');
    $articleStatus->execute(array($articleId));
}

function updateArticles($articleId, $values) {
	$db = dbConnect();
	$modifiedArticle = $db->prepare('UPDATE articles SET title = ?, content = ? WHERE id = ? ');
	$modifiedArticle->execute(array($values['title'], $values['content'],  $articleId));
}

function removeArticle($articleId) {
    $db = dbConnect();
    $comments = $db->prepare('DELETE FROM articles WHERE id = ?');
    $comments->execute(array($articleId));
}



