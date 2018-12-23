<?php

require('models/comments.php');

$comments = getComments($_GET['id'],'validated');

require('views/commentView.php');