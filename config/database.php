<?php

return [
	'type' => 'mysql',
	'name' => 'example',
	'server' => '127.0.0.1',
	'username' => $_ENV['databaseuser'],
	'password' => $_ENV['databasepassword'],
];
