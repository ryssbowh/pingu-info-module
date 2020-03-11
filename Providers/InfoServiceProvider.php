<?php

namespace Pingu\Info\Providers;

use Pingu\Core\Support\ModuleServiceProvider;
use Pingu\Info\InfoProviders\ClientInfo;
use Pingu\Info\InfoProviders\DatabaseInfo;
use Pingu\Info\InfoProviders\PhpInfo;
use Pingu\Info\InfoProviders\ServerInfo;
use Pingu\Info\InfoProviders\SiteInfo;
use Pingu\Infos\Infos;

class InfoServiceProvider extends ModuleServiceProvider
{

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerProviders();
        $this->loadModuleViewsFrom(__DIR__ . '/../Resources/views', 'info');
    }

    public function registerProviders()
    {
        \Infos::registerProvider(ServerInfo::class);
        \Infos::registerProvider(ClientInfo::class);
        \Infos::registerProvider(DatabaseInfo::class);
        \Infos::registerProvider(SiteInfo::class);
        \Infos::registerProvider(PhpInfo::class);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('infos', Infos::class);
        $this->app->register(RouteServiceProvider::class);
    }

}
