<?php 

namespace Pingu\Info\InfoProviders;

use Pingu\Info\Support\InfoProvider;

class DatabaseInfo extends InfoProvider
{
	public static function slug()
	{
		return 'info.database';
	}

	public static function title()
	{
		return 'Database';
	}

	public function infos()
	{
		return \Larinfo::getDatabaseInfo();
	}

	public function permission()
	{
		return 'view database infos';
	}
}