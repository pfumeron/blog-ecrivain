<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link href="style.css" rel="stylesheet" /> 
        <link rel="stylesheet" href="public/css/style_front.css">
    </head>
        
    <body class="article-view">
        <div class="navbar-header">
            <div class="logo">
                <img src="https://placekitten.com/300/100"/>
            </div>
            <ul>
                <li><a href="#">Articles</a></li>
                <li><a href="#">Commentaires</a></li>
                <li><a href="#">Blog</a></li>
            </ul>
        </div>
        <div class="btn-menu">
            <a href="index.php" class="btn-primary">Retour à la liste des billets</a>
        </div>

        <div class="container" id="article-page">
            <div class="content-article">
                <h3><?= htmlspecialchars($article['title']) ?></h3>
                <p class="date">Publié le <? echo $article['creation_date_fr'] ?></p>
                
                <p class="text-article"><?= $article['content'] ?></p>
            </div>
            
        
            <div class="commment-form">
                <h4>Ajouter un commentaire</h4>

                <form action="index.php?action=addComment&amp;id=<?= $article['id'] ?>" method="post">
                    <div>
                        <label for="author">Votre nom</label><br />
                        <input type="text" id="author" name="author" />
                    </div>
                    <div>
                        <label for="comment">Votre commentaire</label><br />
                        <textarea id="comment" name="comment"></textarea>
                    </div>
                    <div>
                        <input type="submit" />
                    </div>
                </form>
            </div>
            
            <div class="comment-list">
                <?php while ($comment = $comments->fetch()) { ?>
                    <p class="comment-reviewed"><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
                    <p class="comment-info">Ajouté par <?= htmlspecialchars($comment['author']) ?>, le <?= $comment['comment_date'] ?></p>
                    
                <?php
                }
                ?>
            </div>
    


        </div>
    </body>
</html>