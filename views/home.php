<!DOCTYPE html>
<html>
    <head>
        <title>Blog Ecrivain</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <h2>Page d'accueil</h2>
        <p>Derniers billets du blog</p>
        
        <?php
        while ($data = $articles->fetch())
        {
        ?>
        
        <div class="news">
            <h3>
                <a href="index.php?action=getArticle&id=<?php echo $data['id'] ?>"><?php echo htmlspecialchars($data['title']); ?></a> 
                <em>le <?php echo $data['creation_date']; ?></em>
            </h3>
            
            <p>
            <?php
            echo nl2br(htmlspecialchars($data['content']));
            ?>
            <br />
            <em><a href="index.php?action=getComments&id=<?php echo $data['id'] ?>">Commentaires</a></em>
            </p>
        </div>
        <?php
        }
        $articles->closeCursor();
        ?>

    </body>
</html>