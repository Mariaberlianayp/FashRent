<?php

namespace App\Http\Controllers;

use App\Models\categoryModel;
use App\Models\productimageModel;
use App\Models\shopModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class searchController extends Controller
{


    public function categorySearch($id){

        $data = DB::table('product')->where('product.category_id',$id)->get();

        $shops = shopModel::all();

        $photos = productimageModel::all();


        return view ('search',['products'=>$data,'shops'=>$shops,'photos'=>$photos]);
    }

}
