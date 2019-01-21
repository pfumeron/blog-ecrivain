<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
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

		<div class="btn-class">
			<a class="btn-view-admin top-right" href="index.php?action=newArticle">Créer un nouvel article</a>
		</div>

    	
    	
		<div class="row">
			<div class="admin-left-block">
                <div class="admin-title">
                	<h2>Derniers billets du blog</h2>
                    <div>
						<?php while ($data = $articles->fetch()) { ?>    
				        <div class="admin-article-title"><h3><?php echo $data['title']; ?></h3></div>
				        <p class="time">Publié le <?php echo $data['creation_date']; ?></p> 
				        <p><a href="">Nombre de commentaires (<?php echo $data['nbTotalComments']; ?>)</a></p>
				        <p><a href="">Nouveaux Commentaires (<?php echo $data['nbNewComment']; ?>)</a></p>
				           
				        <a class="btn-view-admin" href="index.php?action=getArticle&id=<?php echo $data['id'] ?>">Voir l'article</a>
				            
				        <?php } $articles->closeCursor(); ?>

                    </div>
                </div>
            </div>

        	
		</div>

    </body>
</html>