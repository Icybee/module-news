<?php

namespace Icybee\Modules\News;

use ICanBoogie\ActiveRecord\Model;
use ICanBoogie\Module\Descriptor;

return [

	Descriptor::CATEGORY => 'contents',
	Descriptor::INHERITS => 'contents',
	Descriptor::MODELS => [

		'primary' => [

//			Model::CLASSNAME => NewsModel::class,
//			Model::ACTIVERECORD_CLASS => News::class,
			Model::EXTENDING => 'contents'

		]

	],

	Descriptor::NS => __NAMESPACE__,
	Descriptor::TITLE => 'News'

];
