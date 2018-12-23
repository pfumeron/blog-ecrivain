<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <h1>Admin de mon super blog !</h1>
        <p>Créer un nouvel article</p>

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
            <br /></p>
            
        </div>
        <?php
        }
        $articles->closeCursor();
        ?>
        


        <h3>Nouveaux commentaires</h3>
        <?php
        	while ($comment = $comments->fetch())
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
        	$comments->closeCursor();
        ?>

		</div>

		<div class="news">
			<h3>Brouillon Rapide</h3>
			<form  action="index.php?action=createArticle" method="post">
	            <div>
	                <label for="title">Titre</label><br />
	                <input type="text" id="title" name="title" />
	            </div>
	            <div>
	                <label for="content">Contenu</label><br />
	                <textarea id="content" name="content"></textarea>
	            </div>
	            <div>
	                <input type="submit" />
	            </div>
        	</form>


		</div>



    </body>
</html>