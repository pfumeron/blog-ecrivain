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
		<nav>
            <div class="logo">
                <img src="public/images/logo_blog.png"/>
            </div>
            <ul>
                <li>Administration du site</li>
            </ul>
        </nav>

		<div class="btn-class top-right">
			<a class="btn-view-admin" href="index.php?action=adminArticles">Retour</a>
            <a class="btn-view-admin disconnect" href="index.php?action=logout">Me déconnecter</a>
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
                <h4>Nouveaux commentaires</h4>
                <?php if (sizeof($comments) == 0) { 
                    echo "<p>Il n'y a pas de nouveaux commentaires.</p>"; }
                    else { for ($i=0; $i < sizeof($comments); $i++) { ?>
                    <p class="comment-reviewed"><?= nl2br(htmlspecialchars($comments[$i]->comment)) ?></p>
                    <p class="comment-info">Ajouté par <?= htmlspecialchars($comments[$i]->author) ?>, le <?= $comments[$i]->comment_date ?></p>
                    <a class="btn-comments" onClick="javascript: return confirm('Voulez-vous publier ce commentaire ?');" href="index.php?action=validComment&articleId=<?php echo $comments[$i]->article_id ?>&id=<?php echo $comments[$i]->id ?>">Valider</a> 
                    <a class="btn-comments" onClick="javascript: return confirm('Voulez-vous supprimer ce commentaire ? Cette action est définitive');" href="index.php?action=deleteComment&articleId=<?php echo $comments[$i]->article_id ?>&id=<?php echo $comments[$i]->id ?>">Supprimer</a>
                <?php
                    }
                }
                ?>

            </div>
            <div class="comment-list">
                <h4>Commentaires Signalés</h4>
                <?php if (sizeof($flagguedComments) == 0) { 
                    echo "<p>Il n'y a pas de commentaires signalés.</p>"; }
                    else { for ($i=0; $i < sizeof($flagguedComments); $i++) { ?>
                    <p class="comment-reviewed"><?= nl2br(htmlspecialchars($flagguedComments[$i]->comment)) ?></p>
                    <p class="comment-info">Ajouté par <?= htmlspecialchars($flagguedComments[$i]->author) ?>, le <?= $flagguedComments[$i]->comment_date ?></p>
                    <a class="btn-comments" onClick="javascript: return confirm('Voulez-vous confirmer ce commentaire ?');" href="index.php?action=unflag&articleId=<?php echo $flagguedComments[$i]->article_id ?>&id=<?php echo $flagguedComments[$i]->id ?>">Confirmer</a> 
                    <a class="btn-comments" onClick="javascript: return confirm('Voulez-vous supprimer ce commentaire ? Cette action est définitive');" href="index.php?action=deleteComment&articleId=<?php echo $flagguedComments[$i]->article_id ?>&id=<?php echo $flagguedComments[$i]->id ?>">Supprimer</a>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </body>
</html>