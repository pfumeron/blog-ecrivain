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
                <img src="public/images/logo_blog.png"/>
            </div>
            <ul>
                <li><a href="#">Articles</a></li>
                <li><a href="#">Commentaires</a></li>
                <li><a href="#">Blog</a></li>
            </ul>
        </div>

               
        <div class="container" id="home"> 
        <?php $article_top = $articles->fetch() ?>       
            <div class="row first-row">
                <div class="featured-image">
                    <div class="featured-article">
                        <a href="index.php?action=getArticle&id=<?php echo $article_top['id'] ?>"><h3 class="featured-title"><span><?php echo $article_top['title']; ?></span></h3></a>
                        <p><?php echo $article_top['creation_date'] ?></p>
                        <a class="btn-featured" href="index.php?action=getArticle&id=<?php echo $article_top['id'] ?>">Lire l'article</a>
                        
                    </div>
                </div>
                <div class="about-me">
                    <div>
                        <img src="https://placekitten.com/100/100" />
                    </div>
                    <p>Je m'appelle Jean Forteroche, je suis acteur et écrivain et travaille actuellement sur mon prochain roman, "Billet simple pour l'Alaska".</p>
                </div>
            </div>
            
            <div><h2 class="main-title">Derniers articles</h2></div>

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