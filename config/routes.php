<?php

namespace Icybee\Modules\News;

use Icybee\Routing\RouteMaker as Make;

return Make::admin('news', Routing\NewsAdminController::class, [

	'id_name' => 'nid'

]);
