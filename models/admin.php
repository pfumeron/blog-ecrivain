<?php 

class Admin {
    public $id;
    public $email;
    public $password;

	static function exists($email,$password) {
		$db = dbConnect();
		$admin = $db->prepare('SELECT id, email, password FROM admin WHERE email = ?');
		$admin->execute(array($email));
		$admin=$admin->fetch();
		if (password_verify($password,$admin['password']))  {
			return $admin;
		}
		else {
			return null;
		}
	    
	}
}