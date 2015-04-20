<?php

namespace Icybee\Modules\News;

use ICanBoogie\ActiveRecord\Model;
use ICanBoogie\Module\Descriptor;

return [

	Descriptor::CATEGORY => 'contents',
	Descriptor::INHERITS => 'contents',
	Descriptor::MODELS => [

		'primary' => [

			Model::CLASSNAME => __NAMESPACE__ . '\Model',
			Model::EXTENDING => 'contents'

		]

	],

	Descriptor::NS => __NAMESPACE__,
	Descriptor::TITLE => 'News',
	Descriptor::VERSION => '1.0'

];
