<?php 

class Admin {
    public $id;
    public $email;
    public $password;

	static function exists($email,$password) {
		$db = dbConnect();
		$admin = $db->prepare('SELECT id, email, password FROM admin WHERE email = ? AND password = ?');
		$admin->execute(array($email,$password));

	    return $admin->fetch();
	}
}