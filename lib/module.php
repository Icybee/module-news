<?php

/*
 * This file is part of the Icybee package.
 *
 * (c) Olivier Laviale <olivier.laviale@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Icybee\Modules\News;

class Module extends \Icybee\Modules\Contents\Module
{
	protected function lazy_get_views()
	{
		$assets = [

			'assets' => [ 'css' => [ DIR . 'public/page.css' ] ]

		];

		return \ICanBoogie\array_merge_recursive(parent::lazy_get_views(), [

			'view' => $assets,
			'list' => $assets,
			'home' => $assets

		]);
	}
}
