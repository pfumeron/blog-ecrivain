<?php

// DISPLAY COMMENTS BASED ON STATUS OF A SPECIFIC ARTICLE

function getComments($articleId, $status)
{
    $db = dbConnect();
    $comments = $db->prepare('SELECT id, article_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS comment_date, status FROM comments WHERE article_id = ? AND status = ? ORDER BY comment_date ASC');
    $comments->execute(array($articleId,$status));

    return $comments;
}

// ADD COMMENT TO DATABASE

function postComment($articleId, $author, $comment)
{
    $db = dbConnect();
    $comments = $db->prepare('INSERT INTO comments(article_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
    
    $affectedLines = $comments->execute(array($articleId, $author, $comment));
    return $affectedLines;
}

// VALIDATE COMMENT POSTED ABOUT AN ARTICLE

function updateComment($commentId) 
{
    $db = dbConnect();
    $comments = $db->prepare('UPDATE comments SET status = \'validated\' WHERE id = ?');
    $comments->execute(array($commentId));
}

// DELETE COMMENT POSTED ABOUT AN ARTICLE

function removeComment($commentId)
{
    $db = dbConnect();
    $comments = $db->prepare('DELETE FROM comments WHERE id = ?');
    $comments->execute(array($commentId));
}

// FLAG COMMENT 
function flagComment($commentId) {
    $db = dbConnect();
    $comments = $db->prepare('UPDATE comments SET flaggued = \'true\' WHERE id = ?');
    $comments->execute(array($commentId));
}

function dbConnect()
{
    try
    {   
        $dbopts = parse_url(getenv('DATABASE_URL'));
        $db = new PDO($dbopts['scheme'].':host='.$dbopts['host'].';dbname='.ltrim($dbopts["path"],'/').';',$dbopts['user'],$dbopts['pass']);
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}