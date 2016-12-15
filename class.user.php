<?php

/**
* 
*/
class User {

	public $id;
	private $username;
	
	function __construct($username, $id) {
		$this->username = $username;
		$this->id       = $id;
	}

	public static function validate_user($name, $password) {
		global $pdo;
		$fetched = $pdo->query("SELECT * FROM users WHERE username = '$name' AND password = '$password'")->fetch();
		return ($fetched > 0) ? true : false;
	}

	public function image_upload($input, $caption) {
		global $pdo;
		$filetmp  = $input['tmp_name'];
		$filename = $input['name'];
		$filetype = $input['type'];
		$filepath = 'photos/' . $filename;
		if ( move_uploaded_file($filetmp, $filepath) ) {
			move_uploaded_file($filetmp, $filepath);
			$pdo->query("INSERT INTO images (path, caption, user_id) VALUES('$filepath', '$caption', 1)");
		} else {
			echo "doesnt work";
		}
	}
}