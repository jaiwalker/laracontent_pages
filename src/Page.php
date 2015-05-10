<?php namespace Jai\Page;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 * @author Jai Kora
 *
 */
class Page extends Model
{
	protected $table = 'pages';
	protected $fillable = array('name', 'slug','content');

	public function getAndSave($name, $slug,$content)
	{
		$this->name    = $name;
		$this->slug    = $slug;
		$this->content = $content;
		$this->save();
	}
}