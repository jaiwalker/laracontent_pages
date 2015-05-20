<?php namespace Jai\Page\Http\Controllers;


use Jai\Backend\Contracts\BackendInterface;
use Jai\Backend\Http\Controllers\CrudController;
use Jai\Backend\Http\Controllers\Transformer;
use Jai\Page\Page;
use DataFilter;

/**
 * 
 * @author jai kora
 */
class PageController extends CrudController implements BackendInterface
{
	protected $transformer;

	function __construct(PageDataTransformer $transform)
	{
		$this->transformer = $transform;

		$this->beforeFilter('auth.basic',['on' =>'post']);
	}


	/**
	 * @param string $entity
	 *
	 * @return mixed
	 * @throws \Exception
	 */
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

	/**
	 * @param string $entity
	 *
	 * @return void
	 */
	public function edit($entity)
	{
		parent::all($entity);

	}

	// Api
	/**
	 * @return mixed
	 */
	public function getAll()
	{
		$all = Page::all();

		return parent::getApiAllData($this->transformer,$all);
	}

	/**
	 * @param null $packageName
	 * @param null $id
	 *
	 * @return mixed
	 */
	public function getSpecific($packageName=NULL,$id=NULL)
	{
		if(empty($id)) return $this->respondNotFound("Invalid strings");
		$result = Page::find($id);

		return parent::getApiSpecificData($this->transformer, $result);
	}

	/**
	 * @return void
	 */
	public function create()
	{
		dd("Creating");
	}





}
