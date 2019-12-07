<?php

namespace Pingu\Info\Providers;

use Illuminate\Support\ServiceProvider;
use Pingu\Info\InfoProviders\ClientInfo;
use Pingu\Info\InfoProviders\DatabaseInfo;
use Pingu\Info\InfoProviders\ServerInfo;
use Pingu\Info\InfoProviders\SiteInfo;

class ProvidersServiceProvider extends ServiceProvider
{
    protected $provides = [
        ServerInfo::class, 
        ClientInfo::class, 
        DatabaseInfo::class, 
        PhpInfo::class
    ];
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    public function register()
    {
        foreach($this->provides as $class){
            $this->app->singleton(
                $class, function ($app) use ($class) {
                    return new $class;
                }
            );
        }
        
    }

    public function provides()
    {
        return $this->provides;
    }

}
