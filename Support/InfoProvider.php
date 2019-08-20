<?php 

namespace Pingu\Info\Support;

abstract class InfoProvider
{
	abstract public static function slug();

	abstract public function infos();

	abstract public static function title();

	abstract public function permission();

	public function resolvePermission()
	{
		if(!$this->permission()) return true;
		return \Auth::user()->can($this->permission());
	}

	public function render()
	{
		return view('info::provider')->with([
			'infos' => $this->infos(),
			'slug' => $this::slug()
		])->render();
	}
}