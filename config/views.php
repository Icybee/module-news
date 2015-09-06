<?php

namespace Icybee\Modules\News;

use Icybee\Modules\Views\ViewOptions as Options;

$assets = [ 'news' => '../public/page.css' ];

return [

	'news' => [

		Options::DIRECTIVE_INHERITS => 'contents',

		'view' => [

			Options::ASSETS => $assets

		],

		'list' => [

			Options::ASSETS => $assets

		],

		'home' => [

			Options::ASSETS => $assets

		]

	]

];
