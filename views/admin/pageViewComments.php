<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mon blog</title>
        <link href="public/css/style_front.css" rel="stylesheet" /> 

        
		<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
		<script>
		  tinymce.init({
		    selector: '#content'
		  });
		</script>

    </head>

    
        
    <body>
		<div class="navbar-header">
            <div class="logo">
                <img src="public/images/logo_blog.png"/>
            </div>
            <ul>
                <li>Administration du site</li>
            </ul>
        </div>

		<div class="btn-class top-right">
			<a class="btn-view-admin" href="index.php?action=adminArticles">Retour</a>
            <a class="btn-view-admin disconnect" href="index.php?action=logout">Me déconnecter</a>
		</div>

        <div class="container" id="article-page">
            <div class="content-article">
                <div class="content-article-title">
                    <? if (isset($alert)) {
                        echo $alert; 
                    }
                    ?>
                    <h3><?= htmlspecialchars($article['title']) ?></h3>
                </div>
                <p class="date">Publié le <? echo $article['creation_date_fr'] ?></p>
                
                <p class="text-article"><?= $article['content'] ?></p>
            </div>
            
            <div class="comment-list">
                <?php while ($comment = $comments->fetch()) { ?>
                    <p class="comment-reviewed"><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
                    <p class="comment-info">Ajouté par <?= htmlspecialchars($comment['author']) ?>, le <?= $comment['comment_date'] ?></p>
                    <a class="btn-comments" href="index.php?action=validComment&articleId=<?php echo $comment['article_id'] ?>&id=<?php echo $comment['id'] ?>">Valider</a> 
                    <a class="btn-comments" href="index.php?action=deleteComment&articleId=<?php echo $comment['article_id'] ?>&id=<?php echo $comment['id'] ?>">Supprimer</a>
                <?php
                }
                ?>
            </div>
        </div>
    </body>
</html>