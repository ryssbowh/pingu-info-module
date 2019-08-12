<?php 

namespace Pingu\Info\InfoProviders;

use Pingu\Info\Support\InfoProvider;

class ClientInfo extends InfoProvider
{
	public static function slug()
	{
		return 'info.client';
	}

	public static function title()
	{
		return 'About you';
	}

	public function infos()
	{
		return \Larinfo::getHostIpinfo();
	}

	public function permission()
	{
		return 'view about you infos';
	}
}