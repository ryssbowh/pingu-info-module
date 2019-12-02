<?php 

namespace Pingu\Info\InfoProviders;

use Pingu\Info\Support\InfoProvider;
use Pingu\User\Entities\User;

class PhpInfo extends InfoProvider
{
    /**
     * @inheritDoc
     */
    public static function slug(): string
    {
        return 'info.php';
    }

    /**
     * @inheritDoc
     */
    public static function title(): string
    {
        return 'Php';
    }

    /**
     * @inheritDoc
     */
    public function infos(): array
    {   
        return [
            'Version' => phpversion(),
            'Memory Limit' => ini_get('memory_limit'),
            'Extensions' => get_loaded_extensions()
        ];
    }

    /**
     * @inheritDoc
     */
    public function permission(): string
    {
        return 'view php infos';
    }
}