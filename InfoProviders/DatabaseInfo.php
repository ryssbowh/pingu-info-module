<?php 

namespace Pingu\Info\InfoProviders;

use Pingu\Info\Support\InfoProvider;

class DatabaseInfo extends InfoProvider
{
    /**
     * @inheritDoc
     */
    public static function slug(): string
    {
        return 'info.database';
    }

    /**
     * @inheritDoc
     */
    public static function title(): string
    {
        return 'Database';
    }

    /**
     * @inheritDoc
     */
    public function infos(): array
    {
        return \Larinfo::getDatabaseInfo();
    }

    /**
     * @inheritDoc
     */
    public function permission(): string
    {
        return 'view database infos';
    }
}