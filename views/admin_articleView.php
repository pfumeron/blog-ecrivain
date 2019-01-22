

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

		<div class="btn-class">
			<a class="btn-view-admin top-right" href="index.php?action=newArticle">Créer un nouvel article</a>
		</div>

        
	    <div class="row">
	    	<div class="col-md-12 col-lg-12 col-sm-12">    
		        <div class="white-box">
			        <h2 class="box-title">Articles</h2>
			        	<p><a>Tous (<?php echo $nbTotalArticles ?>)</a> | <a>Publiés (<?php echo $nbPublishedArticles['count']; ?>)</a> | <a>Brouillons (<?php echo $nbDraftArticles['count']; ?>)</a></p>
			        	<div class="comment-center">
		                    <div>
						        <table class="table-admin">
						        	<thead>
						        		<colgroup width="15%" />
						        		<colgroup width="25%" />
						        		<colgroup width="25%" />
						        		<colgroup width="10%" />
						        		<colgroup width="10%" />
						        		<colgroup width="15%" />
						        		<tr class="table-title">
						        			<th>Date de publication</th>
						        			<th>Titre</th>
						        			<th>Actions</th>
						        			<th>Nouveaux commentaires</th>
						        			<th>Total Commentaires</th>
						        			<th>Statut</th>
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
						        			<td><a href="index.php?action=publishArticle&id=<?php echo $article['id'] ?>">Publier</a> | 
            									<a href="index.php?action=editArticle&id=<?php echo $article['id'] ?>">Modifier</a> | 
        										<a href="index.php?action=deleteArticle&id=<?php echo $article['id'] ?>">Supprimer</a>
        									</td>
        									<td><?php echo $article['nbNewComment']; ?></td>
        									<td><?php echo $article['nbTotalComments']; ?></td>
        									<td class="list-group-item list-group-item-success"><?php echo $article['article_status']; ?></td>
						        			
						        		</tr>
						        	<?php
							        }
							        $articles->closeCursor();
							        ?>
						        	</tbody>
							
						        </table>
						    </div>
						</div>
				</div>
			</div>
		</div>
	</body>
</html>