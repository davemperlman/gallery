<?php

$config = array(
	'host'     => '127.0.0.1',
	'dbname'   => 'gallery',
	'user'     => 'root',
	'password' => 'root'
	);

$pdo = new PDO("mysql:host=$config[host];dbname=$config[dbname]", $config['user'], $config['password']);

function debug($var) {
	echo "<pre>";
	print_r($var);
	echo "</pre>";
}  