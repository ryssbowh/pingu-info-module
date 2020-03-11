<?php

namespace Pingu\Info\Http\Controllers;

use Pingu\Core\Http\Controllers\BaseController;

class InfoController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('info@index')->with(
            [
            'providers' => \Infos::getProviders()
            ]
        );
    }
}
