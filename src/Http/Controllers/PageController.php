<?php namespace Jai\Page\Http\Controllers;

use Jai\Backend\Contracts\BackendInterface;
use Jai\Backend\Http\Controllers\CrudController;
use Jai\Page\Page;
use DataFilter;

/**
 * 
 * @author jai kora
 */
class PageController extends CrudController implements BackendInterface
{
	public function all($entity)
	{
		parent::all($entity);
		$this->filter = DataFilter::source(new Page());
		$this->filter->add('id', 'ID', 'text');
		$this->filter->add('name', 'Name', 'text');
		$this->filter->submit('search');
		$this->filter->reset('reset');
		$this->filter->build();

		$this->grid = \DataGrid::source($this->filter);
		$this->grid->add('id', 'ID', true)->style("width:100px");
		$this->grid->add('name', 'Name');
		$this->grid->add('slug', 'Slug');
		$this->grid->add('content', 'Content');
		$this->grid->link('/backend/'.$entity . '/edit', "Add New", "TR");  // this not added int ot the repo
		$this->addStylesToGrid();

		return $this->returnView();
	}

}
