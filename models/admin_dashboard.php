<?php 
function logAdmin($email, $password) {
	$db = dbConnect();
	$admin = $db->prepare('SELECT email, password FROM admin WHERE email == $email AND password == $password');
	$admin->execute(array($email,$password));

    return $admin;
}