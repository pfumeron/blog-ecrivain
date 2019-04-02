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
            
        </div>
        <div class="commment-form login">
            <h3>Veuillez entrer le mot de passe </h3>
            
            <form action="index.php?action=loginVerify" method="post">
                
                <input type=text name="email">
                <input type="password" name="password" />
                <input type="submit" id ="submit-login" value="Valider" />
                
            </form>
        </div>
       
        <?php include 'views/layouts/footer.php' ?>
        
    </body>
</html>