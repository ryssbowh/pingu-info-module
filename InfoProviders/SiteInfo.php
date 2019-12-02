<?php 

namespace Pingu\Info\InfoProviders;

use Pingu\Info\Support\InfoProvider;
use Pingu\User\Entities\User;

class SiteInfo extends InfoProvider
{
    /**
     * @inheritDoc
     */
    public static function slug(): string
    {
        return 'info.site';
    }

    /**
     * @inheritDoc
     */
    public static function title(): string
    {
        return config('app.name');
    }

    /**
     * @inheritDoc
     */
    public function infos(): array
    {   
        return [
            'Installed' => pingu_installed_time(),
            'Users' => User::count()
        ];
    }

    /**
     * @inheritDoc
     */
    public function permission(): string
    {
        return 'view site infos';
    }
}