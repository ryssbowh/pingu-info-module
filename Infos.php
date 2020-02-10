<?php

namespace Pingu\Infos;

use Illuminate\Support\Arr;
use Pingu\Info\Support\InfoProvider;

class Infos
{
    /**
     * Registered providers (class names)
     * 
     * @var array
     */
    protected $providers = [];

    /**
     * Resolved providers (class instances)
     * 
     * @var boolean|array
     */
    protected $resolvedProviders = false;

    /**
     * Registers a provider
     *
     * @param string $provider class name
     */
    public function registerProvider(string $provider)
    {
        if(!in_array($provider, $this->providers)) {
            $this->providers[] = $provider;
        }
    }

    /**
     * Resolve all providers
     * 
     * @return array
     */
    protected function resolveProviders()
    {
        if(!$this->resolvedProviders) {
            $this->resolvedProviders = array_map(
                function ($provider) {
                    return $this->resolveProvider($provider);
                }, $this->providers
            );
        }

        return $this->resolvedProviders;
    }

    /**
     * Resolve one provider through IOC
     * 
     * @param  string $provider
     * @return InfoProvider
     */
    protected function resolveProvider(string $provider)
    {
        return app($provider);
    }

    /**
     * Get all provider slugs
     * 
     * @return array
     */
    public function getProviderSlugs()
    {
        $out = array_map(
            function ($provider) {
                return $provider::slug();
            }, $this->resolveProviders()
        );

        return array_unique($out);
    }

    /**
     * Get resolved providers, can be filtered by slugs.
     * Will check permissions
     * 
     * @param  mixed $providersSlugs
     * @return array
     */
    public function getProviders($providersSlugs = [])
    {
        $slugs = $this->getProviderSlugs();
        if(empty($providersSlugs)) {
            $providersSlugs = $slugs;
        }
        elseif(!is_array($providersSlugs)) {
            $providersSlugs = [$providersSlugs];
        }
        
        return array_filter(
            $this->resolveProviders(), function ($provider) use ($providersSlugs) {
                if(!in_array($provider::slug(), $providersSlugs)) { 
                    return false;
                }
                if(app()->runningInConsole()) { 
                    return true;
                }
                return $provider->resolvePermission();
            }
        );
    }

    /**
     * Get infos. Can be filtered by slugs
     * Will check permissions
     * 
     * @param  mixed $providersSlugs
     * @return array
     */
    public function getInfos($providersSlugs)
    {
        $providers = $this->getProviders(Arr::wrap($providersSlugs));

        foreach ($providers as $provider) {
            $out[] = [
                'title' => $provider::title(),
                'infos' => $provider->infos()
            ];
        }
        return $out;
    }
}