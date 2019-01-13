

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
		<header>
			<nav class="navbar-default sidebar">
				<div class="slimScrollDiv">
					<div class="sidebar-nav slimscrollsidebar">
						<ul class="nav in" id="side-menu">
							<li class="accueil"><a class="waves-effect active" href="#accueil">Accueil</a></li>
							<li><a class="waves-effect active" href="#services">Services</a></li>
							<li><a class="waves-effect active" href="#portfolio">Portfolio</a></li>
							<li><a class="waves-effect active" href="#contact">Contact</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</header>

        <h1>Admin de mon super blog !</h1>
        <div><a class="btn btn btn-rounded btn-default btn-outline m-r-5" href="index.php?action=newArticle">Créer un nouvel article</a></div>
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
            									<a href="index.php?action=editArticle&id=<?php echo $article['id'] ?>">Modifier</a> | 
        										<a href="index.php?action=deleteArticle&id=<?php echo $article['id'] ?>">Supprimer</a>
        									</td>
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