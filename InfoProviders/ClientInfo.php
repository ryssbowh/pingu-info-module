<?php 

namespace Pingu\Info\InfoProviders;

use Pingu\Info\Support\InfoProvider;

class ClientInfo extends InfoProvider
{
    /**
     * @inheritDoc
     */
    public static function slug(): string
    {
        return 'info.client';
    }

    /**
     * @inheritDoc
     */
    public static function title(): string
    {
        return 'About you';
    }

    /**
     * @inheritDoc
     */
    public function infos(): array
    {
        return \Larinfo::getHostIpinfo();
    }

    /**
     * @inheritDoc
     */
    public function permission(): string
    {
        return 'view about you infos';
    }
}