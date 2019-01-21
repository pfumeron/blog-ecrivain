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
        <div><a class="btn btn btn-rounded btn-default btn-outline m-r-5" href="index.php?action=adminArticles">Retour</a></div>
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
	</body>
</html>