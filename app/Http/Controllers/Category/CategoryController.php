<?php

namespace App\Http\Controllers\Category;

use App\Category;
use App\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(Region $region)
    {
        $categories = Category::withListingsInRegion($region)->get()->toTree();

        return view('categories.index', compact('categories'));
    }
}
