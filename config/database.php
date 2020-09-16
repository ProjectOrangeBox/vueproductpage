<?php

return [
	'type' => 'mysql',
	'name' => $_ENV['databasename'],
	'server' => $_ENV['databasehost'],
	'username' => $_ENV['databaseuser'],
	'password' => $_ENV['databasepassword'],
];
