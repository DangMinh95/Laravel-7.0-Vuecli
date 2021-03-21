<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpaController extends Controller
{
    /**
     * Returns the default page
     */
    public function index()
    {
        return view('welcome');
    }
}
