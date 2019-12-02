<?php 

namespace Pingu\Info\Support;

abstract class InfoProvider
{
    /**
     * Unique slug for this provider
     * 
     * @return string
     */
    abstract public static function slug(): string;

    /**
     * Infos as array
     * 
     * @return array
     */
    abstract public function infos(): array;

    /**
     * Title for this provider
     * 
     * @return string
     */
    abstract public static function title(): string;

    /**
     * Permission to access this provider
     * 
     * @return string
     */
    abstract public function permission(): string;

    /**
     * Resolve the permission
     * 
     * @return bool
     */
    public function resolvePermission(): bool
    {
        if(!$this->permission()) return true;
        return \Auth::user()->can($this->permission());
    }

    /**
     * Render this provider
     * 
     * @return View
     */
    public function render()
    {
        return view('info::provider')->with([
            'infos' => $this->infos(),
            'slug' => $this::slug()
        ])->render();
    }
}