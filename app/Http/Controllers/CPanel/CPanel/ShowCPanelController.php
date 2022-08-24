<?php

namespace App\Http\Controllers\CPanel\CPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowCPanelController extends Controller
{
    //

    public function showCPanel()
    {
        return response()->view('cpanel.cpanel');
    }
}
