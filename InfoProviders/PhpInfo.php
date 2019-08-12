<?php 

namespace Pingu\Info\InfoProviders;

use Pingu\Info\Support\InfoProvider;
use Pingu\User\Entities\User;

class PhpInfo extends InfoProvider
{
	public static function slug()
	{
		return 'info.php';
	}

	public static function title()
	{
		return 'Php';
	}

	public function infos()
	{	
		return [
			'Version' => phpversion(),
			'Memory Limit' => ini_get('memory_limit'),
			'Extensions' => get_loaded_extensions()
		];
	}

	public function permission()
	{
		return 'view php infos';
	}
}