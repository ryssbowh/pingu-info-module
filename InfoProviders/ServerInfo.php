<?php 

namespace Pingu\Info\InfoProviders;

use Pingu\Info\Support\InfoProvider;

class ServerInfo extends InfoProvider
{
	public static function slug()
	{
		return 'info.server';
	}

	public static function title()
	{
		return 'Server';
	}

	public function infos()
	{
		return \Larinfo::getServerInfo();
	}

	public function permission()
	{
		return 'view server infos';
	}
}