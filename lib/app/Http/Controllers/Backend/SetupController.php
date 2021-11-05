<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SetupController extends Controller
{
    //
    public function getSetup()
    {
    	return view('backend.setUp');

    }
}
