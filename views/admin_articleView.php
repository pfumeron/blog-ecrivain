<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link href="style.css" rel="stylesheet" /> 

        
		<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
		<script>tinymce.init({ selector:'textarea' });</script>

    </head>
        
    <body>
        <h1>Admin de mon super blog !</h1>
        <h2>Tous les articles</h2>
        
        <?php
        while ($article = $articles->fetch())
        {
        ?>
        
        <div class="news">
            <h3>
                <a href="index.php?action=getArticle&id=<?php echo $article['id'] ?>"><?php echo htmlspecialchars($article['title']); ?></a> 
                <em>le <?php echo $article['creation_date']; ?></em>
            </h3>
            
            <p>
            <?php
            	echo nl2br(htmlspecialchars($article['content']));
            ?>
            <br /></p>
            
            <a href="index.php?action=publishArticle&id=<?php echo $article['id'] ?>">Publier</a>
            
            <a href="index.php?action=validComment&id=<?php echo $comment['id'] ?>">Modifier</a> 
        	<a href="index.php?action=deleteComment&id=<?php echo $comment['id'] ?>">Supprimer</a>

        </div>
        <?php
        }
        $articles->closeCursor();
        ?>

		</div>
	</body>
</html>