

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mon blog</title>
        <link href="public/css/style.css" rel="stylesheet" /> 

        
		<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
		<script>
		  tinymce.init({
		    selector: '#content'
		  });
		</script>

    </head>

    
        
    <body>
        <h1>Admin de mon super blog !</h1>
	    <div class="row">
	    	<div class="col-md-12 col-lg-12 col-sm-12">    
		        <div class="white-box">
			        <h2 class="box-title">Articles</h2>
			        	<p><a>Tous (<?php echo $nbTotalArticles ?>)</a> | <a>Publiés (<?php echo $nbPublishedArticles['count']; ?>)</a> | <a>Brouillons (<?php echo $nbDraftArticles['count']; ?>)</a></p>
			        	<div class="comment-center">
		                    <div class="mail-contnet">
						        <table class="table table-bordered table-hover table-responsive">
						        	<thead>
						        		<colgroup width="15%" />
						        		<colgroup width="45%" />
						        		<colgroup width="25%" />
						        		<colgroup width="15%" />
						        		<tr>
						        			<th>Date de publication</th>
						        			<th>Titre</th>
						        			<th>Actions</th>
						        			<th>Statut</th>
						        		</tr>
						        	</thead>
						        	<tbody>

						        	<?php
							        while ($article = $articles->fetch())
							        {
							        ?>
						        		<tr>
						        			<td>Le <?php echo $article['creation_date']; ?></td>
						        			<td><?php echo htmlspecialchars($article['title']); ?></td>
						        			<td><a href="index.php?action=publishArticle&id=<?php echo $article['id'] ?>">Publier</a> | 
            									<a href="index.php?action=validComment&id=<?php echo $comment['id'] ?>">Modifier</a> | 
        										<a href="index.php?action=deleteComment&id=<?php echo $comment['id'] ?>">Supprimer</a>
        									</td>
        									<td class="badge"><?php echo $article['article_status']; ?></td>
						        			
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

        

        <div class="row">
	    	<div class="col-md-12 col-lg-12 col-sm-12">    
		        <div class="white-box">
			        <h2 class="box-title">Écrire un nouvel article</h2>
				        <div class="comment-center">
	                    	<div class="mail-contnet">
						        <form class="form" action="index.php?action=createArticle" method="post">
						        	<div class="form-group">
							            <label for="title">Titre</label><br />
						        		<input class="form-control" type="text" id="title" name="title" />
						        	</div>

						        	<div>
							        <label for="content">Contenu de l'article</label><br />
							        <textarea id="content" name="content" rows="15">

										

									</textarea>
									</div>
									<div>
							        	<input class="btn btn btn-rounded btn-default btn-outline m-r-5" value="Enregistrer" type="submit" />
							        </div>
								</form>
							</div>
						</div>
				</div>
			</div>
		</div>
        
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
            	echo $article['content'];
            ?>
            <br /></p>
            
            

        </div>
        <?php
        }
        $articles->closeCursor();
        ?>

		</div>
	</body>
</html>