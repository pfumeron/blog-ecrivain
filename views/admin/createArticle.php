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
		    selector: '#content',
		    body_class : "my_class"
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
			<a class="btn-view-admin" href="index.php?action=adminArticles">Retour</a>
			<a class="btn-view-admin disconnect" href="index.php?action=logout">Me déconnecter</a>
		</div>
		</div>
  		<div class="row">
			<h2 class="admin-title">Écrire un nouvel article</h2>
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
		        	<input class="btn-form" value="Enregistrer" type="submit" />
		        </div>
			</form>
		</div>
						
	</body>
</html>