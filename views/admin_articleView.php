<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link href="style.css" rel="stylesheet" /> 

        
		<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
		<script>tinymce.init({ 
			selector:'textarea', 
			browser_spellcheck: true,
  			contextmenu: false });
  		</script>

    </head>
        
    <body>
        <h1>Admin de mon super blog !</h1>
        <h2>Tous les articles</h2>
        <p>Écrire un nouvel article</p>
        <form action="index.php?action=createArticle" method="post">
        	<div>
	            <label for="title">Titre</label><br />
        		<input type="text" id="title" name="title" />
        	</div>

        	<div>
	        <label for="content">Contenu de l'article</label><br />
	        <textarea id="content" name="content">
			  
			  	<h1 style="text-align: center;">Welcome to the TinyMCE editor demo!</h1>

			  	<p>Commencez à écrire</p>
				

			  	<h2>Got questions or need help?</h2>

				<ul>
				    <li>Our is a great resource for learning how to configure TinyMCE.</li>
				    <li>Have a specific question? Visit the <a href="https://community.tinymce.com/forum/" target="_blank">Community Forum</a>.</li>
				    <li>We also offer enterprise grade support as part of <a href="www.tinymce.com/pricing">TinyMCE Enterprise</a>.</li>
				</ul>
			</textarea>
			</div>
			<div>
	        	<input type="submit" />
	        </div>
		</form>
        
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