<?php

namespace App\Http\Controllers;
use App\Models\categoryModel;
use App\Models\shopModel;
use App\Models\productModel;
use App\Models\degreephotoModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        return view('home');
    }

    public function afterRegister()
    {

        return view('auth.afterRegister');
    }

    public function showProfil($id)
    {
        $data = User::where('users.id','=',Auth::user()->id)
        ->get();


        return view('profil',['data'=>$data]);
    }
}
