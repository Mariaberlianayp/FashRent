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
        
        $this->middleware('auth');


    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $categories = categoryModel::all();
        // $shops = shopModel::all();
        // $products = productModel::all();
        // $photos = degreephotoModel::all();
        // return view('home', compact('categories', 'shops', 'products', 'photos'));

        return view('auth.afterRegister');
    }
}
