<!DOCTYPE html>
<html lang="fr">
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
            <?php $article_top = $articles[0] ?>  
            <div class="row first-row">
                <div class="featured-image">
                    <div class="featured-article">
                        <a href="index.php?action=getArticle&id=<?php echo $article_top->id ?>">
                            <h3 class="featured-title">
                                <span><?php echo $article_top->title ?></span>
                            </h3>
                        </a>
                        <p><?php echo $article_top->creation_date ?></p>
                        <a class="btn-featured" href="index.php?action=getArticle&id=<?php echo $article_top->id ?>">Lire l'article</a>
                    </div>
                </div>
                <div class="about-me">
                    <div>
                        <img alt="author-picture" src="https://placekitten.com/100/100">
                    </div>
                    <p>Je m'appelle Jean Forteroche, je suis acteur et écrivain et travaille actuellement sur mon prochain roman, "Billet simple pour l'Alaska".</p>
                </div>
            </div>
            <div>
                <h2 class="main-title">Derniers articles</h2>
            </div>
            <?php $index = 0; ?>
            <?php for ($i=1; $i < sizeof($articles); $i++) { ?>
                
                <?php if ($index % 3 == 0) { ?> <div class="row second-row"> <?php } ?>
                    <div class="article">
                        <a href="index.php?action=getArticle&id=<?php echo $articles[$i]->id ?>">
                            <div class="article-title-background">
                                <h3 class="article-title"><span><?php echo $articles[$i]->title ?></span></h3>
                            </div>
                        </a>
                        <p>Publié le <?php echo $articles[$i]->creation_date ?></p>
                    </div>
                
            <?php 
                $index++;

            }  ?>
            <?php if ($index % 3 == 0) { ?> </div> <?php } ?>
        </div>

        <div class="all-articles">
            <a href="index.php?action=home" class="btn-home-articles">Voir tous les articles</a>
        </div>
        <?php include 'views/layouts/footer.php' ?>
    </body>
</html>