<?php 

require('models/articles.php');
require('models/comments.php');
require('models/admin.php');

function dbConnect()
{
    try
    {   
        $dbopts = parse_url(getenv('DATABASE_URL'));
        $db = new PDO($dbopts['scheme'].':host='.$dbopts['host'].';dbname='.ltrim($dbopts["path"],'/').';',$dbopts['user'],$dbopts['pass']);
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}