<?php

/*
 * This file is part of the Icybee package.
 *
 * (c) Olivier Laviale <olivier.laviale@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Icybee\Modules\Nodes;

use ICanBoogie\Updater\Update;
use ICanBoogie\Updater\AssertionFailed;

/**
 * @module news
 */
class Update20130429 extends Update
{
	/**
	 * Change constructor from `contents.news` to `news`.
	 */
	public function update_constructor()
	{
		$model = $this->app->modules['nodes']->model;
		$count = $model->filter_by_constructor('contents.news')->count;

		if (!$count)
		{
			throw new AssertionFailed(__FUNCTION__, []);
		}

		$model("UPDATE {self} SET constructor = ? WHERE constructor = ?", [ 'news', 'contents.news' ]);
	}

	public function update_registry()
	{
		$model = $this->app->models['registry/site'];
		$count = $model->where("`name` LIKE '%contents_news%'")->count;

		if (!$count)
		{
			throw new AssertionFailed(__FUNCTION__, []);
		}

		$model("UPDATE {self} SET name = REPLACE(name, 'contents_news', 'news') WHERE name LIKE '%contents_news%'");
	}
}
