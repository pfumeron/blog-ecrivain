<!DOCTYPE html>
<html>
    <head>
        <title>Blog Ecrivain</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" media="screen" href="public/css/style_front.css">
        <link rel="stylesheet" type="text/css" media="screen and (max-width: 1280px)" href="public/css/style_front_responsive.css"> 
        
    </head>
    <body>
        <?php include 'views/layouts/header.php' ?>
               
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
                        <a href="index.php?action=getArticle&id=<?php echo $data['id'] ?>">
                            <div class="article-title-background">
                            <h3 class="article-title"><span><?php echo $data['title']; ?></span></h3>
                        </div>
                    </a>
                    <p>Publié le <?php echo $data['creation_date'] ?></p>
                    </div>
                </a>
                <?php $index++; ?>
                <?php if ($index % 3 == 0) { ?> </div> <?php } ?>
            
            <?php } $articles->closeCursor(); ?>
            


        </div>
        <div class="all-articles">
            <a href="index.php?action=home" class="btn-home-articles">Voir tous les articles</a>
        </div>
        <?php include 'views/layouts/footer.php' ?>

    </body>
</html>