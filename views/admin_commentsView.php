<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <h1>Admin de mon super blog !</h1>
        <h2>Tous les Commentaires</h2>
        
        <?php
            while ($comment = $underReviewComments->fetch())
        {
        ?>
        
        <div class="news">
            
            <p><strong><?php echo htmlspecialchars($comment['author']); ?></strong> <br/>posté le <?php echo $comment['comment_date']; ?> Status : <?php echo $comment['status']; ?></p>
            <p>Article : 
                <?php
                echo nl2br(htmlspecialchars($comment['article_title']));
                ?>
            </p>
            <p>Commentaire : 
                <?php
                echo nl2br(htmlspecialchars($comment['comment']));
                ?>
            </p>
            <a href="index.php?action=validComment&id=<?php echo $comment['id'] ?>">Valider</a> 
            <a href="index.php?action=deleteComment&id=<?php echo $comment['id'] ?>">Supprimer</a>
        </div>
        <?php
        }
            $underReviewComments->closeCursor();
        ?>

        <?php
            while ($comment = $validatedComments->fetch())
        {
        ?>
        
        <div class="news">
            
            <p><strong><?php echo htmlspecialchars($comment['author']); ?></strong> <br/>posté le <?php echo $comment['comment_date']; ?> Status : <?php echo $comment['status']; ?></p>
            <p>Article : 
                <?php
                echo nl2br(htmlspecialchars($comment['article_title']));
                ?>
            </p>
            <p>Commentaire : 
                <?php
                echo nl2br(htmlspecialchars($comment['comment']));
                ?>
            </p>
            <a href="index.php?action=validComment&id=<?php echo $comment['id'] ?>">Valider</a> 
            <a href="index.php?action=deleteComment&id=<?php echo $comment['id'] ?>">Supprimer</a>
        </div>
        <?php
        }
            $validatedComments->closeCursor();
        ?>


	</body>
</html>