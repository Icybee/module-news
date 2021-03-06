<?php

/*
 * This file is part of the Icybee package.
 *
 * (c) Olivier Laviale <olivier.laviale@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Icybee\Modules\News\Block;

use Icybee\Modules\Contents\Content;

use Brickrouge\Form;
use Brickrouge\Element;

/**
 * Edit block for news.
 */
class EditBlock extends \Icybee\Modules\Contents\Block\EditBlock
{
	protected function lazy_get_children()
	{
		return array_merge(parent::lazy_get_children(), [

			Content::DATE => new \Brickrouge\Date([

				Form::LABEL => 'Date',
				Element::REQUIRED => true,
				Element::DEFAULT_VALUE => date('Y-m-d')

			])
		]);
	}
}
