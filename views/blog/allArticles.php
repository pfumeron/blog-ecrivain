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
        <div class="subtitle-section">
            <a class="subtitle" href="index.php">Retour à la page d'accueil</a>
        </div>
               
        <div class="container" id="home">
            <div>
                <h2 class="main-title">Tous les articles</h2>
                
            </div>

            <?php $index = 0; ?>
            <?php for ($i=0; $i < sizeof($articles); $i++)   {?>
                <?php if ($index % 3 == 0) { ?> <div class="row second-row"> <?php } ?>
                <div class="article">
                    <div class="article-title-background">
                        <a href="index.php?action=getArticle&id=<?php echo $articles[$i]->id ?>"><h3 class="article-title"><span><?php echo $articles[$i]->title; ?></span></h3></a>
                    </div>
                    <p>Publié le <?php echo $articles[$i]->creation_date ?></p>
                </div>
                <?php $index++; ?>
                <?php if ($index % 3 == 0) { ?> </div> <?php } ?>
            
            <?php }  ?>
            


        </div>
        
        <?php include 'views/layouts/footer.php' ?>

    </body>
</html>