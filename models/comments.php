<?php

class Comment {
    public $id;
    public $article_id;
    public $comment;
    public $comment_date;
    public $status;
    public $flaggued;

    static function get($articleId, $status) // DISPLAY COMMENTS BASED ON STATUS OF A SPECIFIC ARTICLE
        {
            $db = dbConnect();
            $comments = $db->prepare('SELECT id, article_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS comment_date, status, flaggued FROM comments WHERE article_id = ? AND status = ? ORDER BY comment_date ASC');
            $comments->execute(array($articleId,$status));

            $obj_comments = [];

            while ($data = $comments->fetch()) {

                $new_obj_comment = new Comment();

                $new_obj_comment->id = $data['id'];
                $new_obj_comment->article_id = $data['id'];
                $new_obj_comment->author = $data['author'];
                $new_obj_comment->comment = $data['comment'];
                $new_obj_comment->comment_date = $data['comment_date'];
                $new_obj_comment->status = $data['status'];
                $new_obj_comment->status = $data['flaggued'];

                array_push($obj_comments, $new_obj_comment);
            }
            $comments->closeCursor();

            return $obj_comments;
        }

        static function post($articleId, $author, $comment) { // ADD COMMENT TO DATABASE
            $db = dbConnect();
            $comments = $db->prepare('INSERT INTO comments(article_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
            $affectedLines = $comments->execute(array($articleId, $author, $comment));
        }

        static function update($commentId) { // VALIDATE COMMENT POSTED ABOUT AN ARTICLE
            $db = dbConnect();
            $comments = $db->prepare('UPDATE comments SET status = \'validated\' WHERE id = ?');
            $comments->execute(array($commentId));
        }

        static function remove($commentId) {// DELETE COMMENT POSTED ABOUT AN ARTICLE 
            $db = dbConnect();
            $comments = $db->prepare('DELETE FROM comments WHERE id = ?');
            $comments->execute(array($commentId));
        }

        static function flag($commentId) { // FLAG COMMENT 
            $db = dbConnect();
            $comments = $db->prepare('UPDATE comments SET flaggued = \'true\' WHERE id = ?');
            $comments->execute(array($commentId));
        }
}
