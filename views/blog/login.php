<!DOCTYPE html>
<html>
    <head>
        <title>Blog Ecrivain</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="public/css/style_front.css">
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