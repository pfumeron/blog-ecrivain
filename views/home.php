<!DOCTYPE html>
<html>
    <head>
        <title>Blog Ecrivain</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="public/css/style.css">
    </head>
    <body>
        <div class="navbar-header">
            <ul>
                <li>Articles</li>
                <li>Commentaires</li>
                <li>Blog</li>
            </ul>
        </div>

        
        <h2>Page d'accueil</h2>
        <div class="col-md-12 col-lg-8 col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Derniers billets du blog</h3>
                <div class="comment-center">
                    <div class="mail-contnet">
                                        
                        <?php
                        while ($data = $articles->fetch())
                        {
                        ?>
                        
                        <div>
                            <a href="index.php?action=getArticle&id=<?php echo $data['id'] ?>"><h3><?php echo $data['title']; ?></h3></a>
                            <p class="time">le <?php echo $data['creation_date']; ?></p>
                            
                            <p class="mail-desc">
                            <?php
                            echo $data['content'];
                            ?>
                            <br />
                            <em><a href="index.php?action=getComments&id=<?php echo $data['id'] ?>">Commentaires</a></em>
                            </p>
                        </div>
                        <?php
                        }
                        $articles->closeCursor();
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>