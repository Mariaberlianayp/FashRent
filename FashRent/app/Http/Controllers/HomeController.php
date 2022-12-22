<?php

namespace App\Http\Controllers;
use App\Models\categoryModel;
use App\Models\shopModel;
use App\Models\productModel;
use App\Models\degreephotoModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    

    public function index()
    {
        $categories = categoryModel::all();
        $shops = shopModel::all();
        $products = productModel::all();
        $photos = degreephotoModel::all();
        return view('home', compact('categories', 'shops', 'products', 'photos'));
    }

}
