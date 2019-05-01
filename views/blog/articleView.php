<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" media="screen" href="public/css/style_front.css">
        <link rel="stylesheet" type="text/css" media="screen and (max-width: 1280px)" href="public/css/style_front_responsive.css"> 
    </head>
        
    <body class="article-view">
        <?php include 'views/layouts/header.php' ?>

        <div class="btn-menu">
            <a href="index.php?action=home" class="btn-primary">Retour à la liste des articles</a>
        </div>

        <div class="container" id="article-page">
            <div class="content-article">
                <div class="content-article-title">
                    <h3><?= htmlspecialchars($article->title) ?></h3>
                </div>
                <p class="date">Publié le <? echo $article->creation_date ?></p>
                <p class="text-article"><?= $article->content ?></p>
            </div>
            
            <div class="comment-list">
                <h4>Commentaires</h4>
                <?php for ($i=0; $i < sizeof($comments); $i++) { ?>
                    <div class="comment-block">
                        <p class="comment-reviewed"><?= nl2br(htmlspecialchars($comments[$i]->comment)) ?></p>
                            <a href="index.php?action=alertComment&articleId=<?php echo $comments[$i]->article_id ?>&id=<?php echo $comments[$i]->id ?>" class="icon-alert">&#9758; Signaler</a>
                        <p class="comment-info">Ajouté par <?= htmlspecialchars($comments[$i]->author) ?>, le <?= $comments[$i]->comment_date ?></p>
                    </div>
                <?php } ?>
            </div>
    
            <div class="commment-form">
                <h4>Ajouter un commentaire</h4>
                <form action="index.php?action=addComment&amp;id=<?= $article->id ?>" method="post">
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