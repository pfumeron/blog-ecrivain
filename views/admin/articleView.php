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
			<a class="btn-view-admin" href="index.php?action=newArticle">Créer un nouvel article</a>
			<a class="btn-view-admin disconnect" href="index.php?action=logout">Me déconnecter</a>
		</div>

        
	    <div class="row">
	        <h2 class="box-title">Articles</h2>
        	<p><a href="index.php?action=adminArticles">Tous (<?php echo $nbTotalArticles ?>)</a> | <a href="index.php?action=adminArticles&status=published">Publiés (<?php echo $nbPublishedArticles['count']; ?>)</a> | <a href="index.php?action=adminArticles&status=draft">Brouillons (<?php echo $nbDraftArticles['count']; ?>)</a></p>
            <div>
		        <table class="table-admin">
		        	<thead>
		        		<colgroup width="15%" />
		        		<colgroup width="25%" />
		        		<colgroup width="15%" />
		        		<colgroup width="10%" />
		        		<colgroup width="10%" />
		        		<colgroup width="25%" />
		        		<tr class="table-title">
		        			<th>Date de publication</th>
		        			<th>Titre</th>
		        			<th>Statut</th>
		        			<th>Nouveaux commentaires</th>
		        			<th>Commentaires signalés</th>
		        			<th>Total Commentaires</th>
		        			<th>Actions</th>
		        		</tr>
		        	</thead>
		        	<tbody>

		        	<?php
			        while ($article = $articles->fetch())
			        {
			        ?>
		        		<tr class="table-content">
		        			<td><?php echo $article['creation_date']; ?></td>
		        			<td><?php echo htmlspecialchars($article['title']); ?></td>
		        			<td class="<?php echo $article['article_status']; ?>-status"><span><?php echo $article['article_status']; ?></span></td>
		        			<td><a class="btn-new-comment" href="index.php?action=adminGetArticle&id=<? echo $article['id'] ?>"><?php echo $article['nbNewComment']; ?></a></td>
							<td><?php echo $article['nbTotalComments']; ?></td>
		        			<td class="<?php echo $article['article_status']; ?>" >
		        				<a class="btn-publish" href="index.php?action=publishArticle&id=<?php echo $article['id'] ?>">Publier |</a>  
								<a class="btn-modify" href="index.php?action=editArticle&id=<?php echo $article['id'] ?>">Modifier</a> | 
								<a class="btn-delete" href="index.php?action=deleteArticle&id=<?php echo $article['id'] ?>">Supprimer</a>
							</td>
							
							
		        			
		        		</tr>
		        	<?php
			        }
			        $articles->closeCursor();
			        ?>
		        	</tbody>
		    	</table>
			</div>
		</div>
	</body>
</html>