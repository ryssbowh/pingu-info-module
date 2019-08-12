<?php 

namespace Pingu\Info\InfoProviders;

use Pingu\Info\Support\InfoProvider;
use Pingu\User\Entities\User;

class SiteInfo extends InfoProvider
{
	public static function slug()
	{
		return 'info.site';
	}

	public static function title()
	{
		return config('app.name');
	}

	public function infos()
	{	
		return [
			'Installed' => pingu_installed_time(),
			'Users' => User::count()
		];
	}

	public function permission()
	{
		return 'view site infos';
	}
}