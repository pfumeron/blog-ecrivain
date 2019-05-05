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
		<nav>
            <div class="logo">
                <img src="public/images/logo_blog.png"/>
            </div>
            <ul>
                <li>Administration du site</li>
            </ul>
        </nav>

		<div class="btn-class top-right">
			<a class="btn-view-admin" href="index.php?action=adminArticles">Retour</a>
            <a class="btn-view-admin disconnect" href="index.php?action=logout">Me déconnecter</a>
		</div>

        <div class="container" id="article-page">
            <div class="content-article">
                <h2 class="preview-title">Voici à quoi ressemblera votre article une fois publié sur le blog</h2>
                <div class="content-article-title">
                    
                    <h3><?= htmlspecialchars($article->title) ?></h3>
                </div>
                <p class="date">Publié le <? echo $article->creation_date ?></p>
                
                <p class="text-article"><?= $article->content ?></p>
            </div>
            
            
        </div>
    </body>
</html>