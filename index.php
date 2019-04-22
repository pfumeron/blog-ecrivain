<?php 
require ('controllers/controller.php');
require ('controllers/admin_controller.php');


if (isset($_GET['action'])) {
    
    // ROUTES BLOG

    if ($_GET['action'] == 'home') {
        
        listAllArticles();
        
    }
    elseif ($_GET['action'] == 'getArticle') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                listArticleAndComment($_GET['id']);
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
    elseif ($_GET['action'] == 'alertComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            alertComment($_GET['id']);
        }
    } elseif ($_GET['action'] == 'thankYou') {
        thankYouView(); 
    } 

    // ROUTES LOGIN / LOGOUT 

    elseif ($_GET['action'] == 'login') {
        loginView();
    }
    elseif ($_GET['action'] == 'loginVerify') {
        login($_POST['email'],$_POST['password']);
    }
    elseif ($_GET['action'] == 'logout') {
        session_start();
        session_destroy();
        header("Location: ".getenv('HOSTNAME')."/index.php?action=login"); 
    }

    // ROUTES BLOG ADMIN

    elseif ($_GET['action'] == 'adminArticles') {        
        session_start(); 
        if (isset($_SESSION['id'])){
            if (!empty($_GET['status']) && ($_GET['status'] == 'published')) {
                adminArticles('publié');
            } elseif (!empty($_GET['status']) && ($_GET['status'] == 'draft')) {
                adminArticles('brouillon');
            } else {
                adminArticles();
            }
        } else {  
            header("Location: ".getenv('HOSTNAME')."/index.php?action=login"); 
        }
    }
    elseif ($_GET['action'] == 'adminGetArticle') {
        session_start(); 
        if (isset($_SESSION['id'])){
            if (isset($_GET['id']) && $_GET['id'] > 0) {
            showArticleWithComments($_GET['id']);
            } else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
        } else {  
            header("Location: ".getenv('HOSTNAME')."/index.php?action=login"); 
        }
    }
    elseif ($_GET['action'] == 'createArticle') {
        session_start(); 
        if (isset($_SESSION['id'])){
            if (!empty($_POST['title']) && !empty($_POST['content'])) {
                createArticle($_POST['title'], $_POST['content']);
            }
            else {
                    echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        } else {  
            header("Location: ".getenv('HOSTNAME')."/index.php?action=login"); 
        }
    }
    elseif ($_GET['action'] == 'newArticle') {
        session_start(); 
        if (isset($_SESSION['id'])){
            newArticle();
        } else {  
            header("Location: ".getenv('HOSTNAME')."/index.php?action=login"); 
        }
    }
    elseif ($_GET['action'] == 'publishArticle') {
        session_start(); 
        if (isset($_SESSION['id'])){
            publishArticle($_GET['id']);
        } else {  
            header("Location: ".getenv('HOSTNAME')."/index.php?action=login"); 
        }
    }

    elseif ($_GET['action'] == 'editArticle') {
        session_start(); 
        if (isset($_SESSION['id'])){
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                editArticle($_GET['id']);
            } else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
        } else {  
            header("Location: ".getenv('HOSTNAME')."/index.php?action=login"); 
        }
    }
    elseif ($_GET['action'] == 'updateArticle') {
        session_start(); 
        if (isset($_SESSION['id'])){    
            updateArticle($_GET['id']);
        } else {  
            header("Location: ".getenv('HOSTNAME')."/index.php?action=login"); 
        }    
    }
    elseif ($_GET['action'] == 'validComment') {
        session_start(); 
        if (isset($_SESSION['id'])){
            validComment($_GET['id']);
        } else {  
            header("Location: ".getenv('HOSTNAME')."/index.php?action=login"); 
        } 
    }
    elseif ($_GET['action'] == 'deleteComment') {
        session_start(); 
        if (isset($_SESSION['id'])){
            deleteComment();
        } else {  
            header("Location: ".getenv('HOSTNAME')."/index.php?action=login"); 
        } 
    }
    elseif ($_GET['action'] == 'deleteArticle') {
        session_start(); 
        if (isset($_SESSION['id'])){
            deleteArticle($_GET['id']);
        } else {  
            header("Location: ".getenv('HOSTNAME')."/index.php?action=login"); 
        }
    }
} else {
    listArticles();
}