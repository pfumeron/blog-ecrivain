<?php

function findAllComments($status) {
    $db = dbConnect();
    $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS comment_date, status, (SELECT title FROM articles AS a WHERE a.id = article_id) as article_title FROM comments WHERE status = ? ORDER BY comment_date DESC');
    $comments->execute(array($status));

    return $comments;
}

function getComments($articleId, $status)
{
    $db = dbConnect();
    $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS comment_date, status FROM comments WHERE article_id = ? AND status = ? ORDER BY comment_date ASC');
    $comments->execute(array($articleId,$status));

    return $comments;
}


function postComment($articleId, $author, $comment)
{
    $db = dbConnect();
    $comments = $db->prepare('INSERT INTO comments(article_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
    
    $affectedLines = $comments->execute(array($articleId, $author, $comment));
    return $affectedLines;
}


function updateComment($commentId) 
{
    $db = dbConnect();
    $comments = $db->prepare('UPDATE comments SET status = \'validated\' WHERE id = ?');
    $comments->execute(array($commentId));
}

function removeComment($commentId)
{
    $db = dbConnect();
    $comments = $db->prepare('DELETE FROM comments WHERE id = ?');
    $comments->execute(array($commentId));
}


// Nouvelle fonction qui nous permet d'éviter de répéter du code
function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8', 'root', 'root');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}