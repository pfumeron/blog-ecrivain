<!DOCTYPE html>
<html>
    <head>
        <title>Blog Ecrivain</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="public/css/style_front.css">
    </head>
    <body>
        <div class="navbar-header">
            <div class="logo">
                <a href="index.php"><img src="public/images/logo_blog.png"/></a>
            </div>
        </div>
        <div class="subtitle-section">
            <a class="subtitle" href="index.php">Retour à la page d'accueil</a>
        </div>
               
        <div class="container" id="home">
            <div>
                <h2 class="main-title">Tous les articles</h2>
                
            </div>

            <?php $index = 0; ?>
            <?php while ($data = $articles->fetch()) { ?>
                <?php if ($index % 3 == 0) { ?> <div class="row second-row"> <?php } ?>
                <div class="article">
                    <div class="article-title-background">
                        <a href="index.php?action=getArticle&id=<?php echo $data['id'] ?>"><h3 class="article-title"><span><?php echo $data['title']; ?></span></h3></a>
                    </div>
                    <p>Publié le <?php echo $data['creation_date'] ?></p>
                </div>
                <?php $index++; ?>
                <?php if ($index % 3 == 0) { ?> </div> <?php } ?>
            
            <?php } $articles->closeCursor(); ?>
            


        </div>
        
        <footer>
            <p>Jean Forteroche ©2019 Tous droits réservés</p>
        </footer>

    </body>
</html>