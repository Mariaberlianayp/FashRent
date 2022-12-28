<?php

namespace App\Http\Controllers;
use App\Models\categoryModel;
use App\Models\shopModel;
use App\Models\productModel;
use App\Models\degreephotoModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
<<<<<<< HEAD
        $this->middleware('auth');
=======
        $categories = categoryModel::all();
        $shops = shopModel::all();
        $products = productModel::all();
        $photos = degreephotoModel::all();
        return view('home', compact('categories', 'shops', 'products', 'photos'));
>>>>>>> 420eb9844efc2014366b18518bb3a9f2097ae7a8
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
