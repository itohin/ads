<?php

namespace App\Http\Controllers;

use App\Region;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $regions = Region::get()->toTree();
        return view('home', compact('regions'));
    }
}
