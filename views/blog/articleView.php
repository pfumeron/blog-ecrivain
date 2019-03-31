<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link href="style.css" rel="stylesheet" /> 
        <link rel="stylesheet" href="public/css/style_front.css">
    </head>
        
    <body class="article-view">
        <?php include 'views/layouts/header.php' ?>

        <div class="btn-menu">
            <a href="index.php?action=home" class="btn-primary">Retour à la liste des articles</a>
        </div>

        <div class="container" id="article-page">
            <div class="content-article">
                <div class="content-article-title">
                    <h3><?= htmlspecialchars($article['title']) ?></h3>
                </div>
                <p class="date">Publié le <? echo $article['creation_date_fr'] ?></p>
                
                <p class="text-article"><?= $article['content'] ?></p>
            </div>
            
            
            <div class="comment-list">
                <h4>Commentaires</h4>
                <?php while ($comment = $comments->fetch()) { ?>
                    <div class="comment-block">
                    <p class="comment-reviewed"><?= nl2br(htmlspecialchars($comment['comment'])) ?> <a href="index.php?action=alertComment&articleId=<?php echo $comment['article_id'] ?>&id=<?php echo $comment['id'] ?>" class="icon-alert">&#9758; Signaler</a></p>
                    <p class="comment-info">Ajouté par <?= htmlspecialchars($comment['author']) ?>, le <?= $comment['comment_date'] ?></p>
                    </div>
                <?php
                }
                ?>
            </div>
    
            <div class="commment-form">
                <h4>Ajouter un commentaire</h4>

                <form action="index.php?action=addComment&amp;id=<?= $article['id'] ?>" method="post">
                    <div>
                        <label for="author">Votre nom</label><br />
                        <input type="text" id="author" name="author" required/>
                    </div>
                    <div>
                        <label for="comment">Votre commentaire</label><br />
                        <textarea id="comment" name="comment" required></textarea>
                    </div>
                    <div>
                        <input type="submit" />
                    </div>
                </form>
            </div>
            <?php include 'views/layouts/footer.php' ?>
        </div>
    </body>
</html>