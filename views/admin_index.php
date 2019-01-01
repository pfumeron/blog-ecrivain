<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
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
			<div class="col-md-12 col-lg-8 col-sm-12">
	            <div class="white-box">
	                <h2 class="box-title">Derniers billets du blog</h2>
	                <div class="comment-center">
	                    <div class="mail-contnet">
							<?php
					        while ($data = $articles->fetch())
					        {
					        ?>
					            
					        <h3><?php echo $data['title']; ?></h3>
					        <p class="time">Publié le <?php echo $data['creation_date']; ?></p>    
					        
					        <a class="btn btn btn-rounded btn-default btn-outline m-r-5" href="index.php?action=getArticle&id=<?php echo $data['id'] ?>">Voir l'article</a>
					            
					        <?php
					        }
					        $articles->closeCursor();
					        ?>

	                    </div>
	                </div>
	            </div>
	        </div>

	        <div class="col-md-12 col-lg-4 col-sm-12">
	        	<div class="white-box">
	                <h2 class="box-title">Brouillon Rapide</h2>
	                	<div class="comment-center">
	                    	<div class="mail-contnet">
								<form class="form" action="index.php?action=createArticle" method="post">
						        	<div class="form-group">
							            <h3><label for="title">Titre</label></h3>
						        		<input class="form-control" type="text" id="title" name="title" />
						        	</div>

						        	<div>
							        	<h3><label for="content">Contenu de l'article</label></h3>
							        	<textarea id="content" name="content" rows="15"></textarea>
									</div>
									<div >
							        	<input class="btn btn btn-rounded btn-default btn-outline m-r-5" value="Enregistrer" type="submit"  />
							        </div>
								</form>
							</div>
						</div>
				</div>
			</div>
		</div>

		<div class="row">
	        <div class="col-md-12 col-lg-8 col-sm-12">
	            <div class="white-box">
	                <h2 class="box-title">Nouveaux commentaires</h2>
				        <div class="comment-center">
	                    	<div class="mail-contnet">
						        <?php
						        	while ($comment = $comments->fetch())
						        {
						        ?>
									
								<div>
									<h4><span class="badge">En attente de validation</span> Posté par : <span class="capitalize"><?php echo $comment['author']; ?></span</h4>
								</div>
								<p class="time">le <?php echo $comment['comment_date']; ?></p> 
								
								<p>Article : <?php echo nl2br(htmlspecialchars($comment['article_title'])); ?>
								</p>
								<p>Commentaire :</p>
								<div class="mail-desc"> 
						            <?php
						            echo nl2br(htmlspecialchars($comment['comment']));
						            ?>
					        	</div>
					        	<a class="btn btn btn-rounded btn-default btn-outline m-r-5 btn-admin-comment" href="index.php?action=validComment&id=<?php echo $comment['id'] ?>">Valider</a> 
					        	<a class="btn btn btn-rounded btn-default btn-outline m-r-5" href="index.php?action=deleteComment&id=<?php echo $comment['id'] ?>">Supprimer</a>
						        
						        <?php
						        }
						        	$comments->closeCursor();
						        ?>
							</div>
						</div>
				</div>
			</div>
		</div>


    </body>
</html>