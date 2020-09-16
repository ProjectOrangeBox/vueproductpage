<?php

return [
	'all' => ['get', 'cli', 'post', 'put', 'delete'], /* optional */
	'default' => ['get', 'cli'], /* optional */
	'routes format' => 'human', /* optional */
	'routes' => [
		/* default routes */
		'/product/<number>' => ['\application\controllers\main', 'product', '<number>'],

		/* all routes */
		'[@]/' => ['\application\controllers\main', 'index'],
		'[@]/(.*)' => ['\application\controllers\main', 'fourohfour'],
	],
];
