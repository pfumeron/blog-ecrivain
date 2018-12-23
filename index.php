<?php 
require ('controllers/controller.php');
require ('controllers/admin_controller.php');




if (isset($_GET['action'])) {
    if ($_GET['action'] == 'home') {
        listArticles();
    }
    elseif ($_GET['action'] == 'admin') {
        adminIndex();
    }
    elseif ($_GET['action'] == 'adminArticles') {
        adminArticles();
    }
    elseif ($_GET['action'] == 'adminComments') {
        AdminListComments();
    }
    elseif ($_GET['action'] == 'createArticle') {
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            createArticle($_POST['title'], $_POST['content']);
        }
        else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
        }
    }
    elseif ($_GET['action'] == 'publishArticle') {
        publishArticle();
    }

    //Comments updates
    elseif ($_GET['action'] == 'validComment') {
        validComment();
    }
    elseif ($_GET['action'] == 'deleteComment') {
        deleteComment();
    }
    //
    elseif ($_GET['action'] == 'getArticle') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            listArticleAndComment();
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    elseif ($_GET['action'] == 'addComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                addComment($_GET['id'], $_POST['author'], $_POST['comment']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    elseif ($_GET['action'] == 'getComments') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            listComments();
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
}
else {
    listArticles();
}