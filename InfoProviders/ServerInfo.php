<?php 

namespace Pingu\Info\InfoProviders;

use Pingu\Info\Support\InfoProvider;

class ServerInfo extends InfoProvider
{
    /**
     * @inheritDoc
     */
    public static function slug(): string
    {
        return 'info.server';
    }

    /**
     * @inheritDoc
     */
    public static function title(): string
    {
        return 'Server';
    }

    /**
     * @inheritDoc
     */
    public function infos(): array
    {
        return \Larinfo::getServerInfo();
    }

    /**
     * @inheritDoc
     */
    public function permission(): string
    {
        return 'view server infos';
    }
}