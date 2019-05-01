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
            
        </div>
        <div class="commment-form login">
            <h3>Connexion à l'administration du blog</h3>
            <?php if (isset($_GET['error']) && $_GET['error']) { 
                echo "<span class='loginError'>Mauvais mot de passe ou email</span>";
            } ?>
            
            <form action="index.php?action=loginVerify" method="post">
                <label for="email">Votre email</label><br />
                <input type=email id="email" name="email"><br />
                <label for="email">Votre mot de passe</label><br />
                <input type="password" id="password" name="password" />
                <input type="submit" id ="submit-login" value="Valider" />
                
            </form>
        </div>
       
        <?php include 'views/layouts/footer.php' ?>
        
    </body>
</html>