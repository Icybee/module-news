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

use ICanBoogie\ActiveRecord\ModelNotDefined;
use ICanBoogie\Updater\Update;
use ICanBoogie\Updater\AssertionFailed;

/**
 * Changed module name from `contents.news` to `news`.
 *
 * @module news
 */
class Update20130429 extends Update
{
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
		$model = $this->app->models['registry'];
		$count = $model->where("`name` LIKE '%contents_news%'")->count;

		if (!$count)
		{
			throw new AssertionFailed(__FUNCTION__, [ "contents_news" ]);
		}

		$model("UPDATE {self} SET name = REPLACE(name, 'contents_news', 'news') WHERE name LIKE '%contents_news%'");
	}

	public function update_registry_thumbnailer_version()
	{
		$model = $this->app->models['registry'];
		$count = $model->where('`name` LIKE "thumbnailer.versions.contents-news%"')->count;

		if (!$count)
		{
			throw new AssertionFailed(__FUNCTION__, [ "thumbnailer.versions.contents-news" ]);
		}

		$model("UPDATE {self} SET name = REPLACE(name, 'thumbnailer.versions.contents-news', 'thumbnailer.versions.news') WHERE name LIKE 'thumbnailer.versions.contents-news%'");
	}

	public function update_registry_site()
	{
		$model = $this->app->models['registry/site'];
		$count = $model->where("`name` LIKE '%contents_news%'")->count;

		if (!$count)
		{
			throw new AssertionFailed(__FUNCTION__, [ "contents_news" ]);
		}

		$model("UPDATE {self} SET name = REPLACE(name, 'contents_news', 'news') WHERE name LIKE '%contents_news%'");
	}

	public function update_taxonomy_vocabulary_scope()
	{
		try
		{
			$model = $this->app->models['taxonomy.vocabulary/scopes'];
		}
		catch (ModelNotDefined $e)
		{
			throw new AssertionFailed(__FUNCTION__, []);
		}

		$count = $model->where('constructor = "contents.news"')->count;

		if (!$count)
		{
			throw new AssertionFailed(__FUNCTION__, []);
		}

		$model('UPDATE {self} SET constructor = "news" WHERE constructor = "contents.news"');
	}

	public function update_page_contents()
	{
		$model = $this->app->models['pages/contents'];
		$count = $model->where('content LIKE "%contents.news%"')->filter_by_editor('view')->count;

		if (!$count)
		{
			throw new AssertionFailed(__FUNCTION__, []);
		}

		$model('UPDATE {self} SET content = REPLACE(content, "contents.news", "news") WHERE content LIKE "%contents.news%" AND editor = "view"');
	}
}
