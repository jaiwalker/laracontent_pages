<?php

namespace Jai\Page\Http\Controllers;
use Jai\Backend\Contracts\Transformer;


/**
 * 
 * @author Elliot Levin <elliotlevin@hotmail.com>
 */
class PageDataTransformer extends Transformer
{

	public function transform($item)
	{
		return [
			'id'=>$item['id'],
			'name'=>$item['name'],
			'slug'=>$item['slug'],
			'content'=>$item['content']
		];
	}
}