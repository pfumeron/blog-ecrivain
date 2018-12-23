<?php

require('models/articles.php');

$articles = getArticles();

require('views/home.php');

?>