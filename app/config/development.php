<?php

return [
	'app' => [
		'url' => 'http://localhost:8080/projector',
		'hash' => [
			'algo' => PASSWORD_BCRYPT,
			'cost' => 10
		]
	],

	'db' => [
		'driver' => 'mysql',
		'host' => '127.0.0.1',
		'name' => 'projector',
		'username' => 'root',
		'password' => 'root',
		'charset' => 'utf8',
		'collation' => 'utf8_unicode_ci',
		'prefix' => '',
	],

	'auth' => [
		'session' => 'user_id'
	],

	'twig' => [
		'debug' => true
	],
	
	'csrf' =>[
		'session' => 'csrf_token'
	]
];