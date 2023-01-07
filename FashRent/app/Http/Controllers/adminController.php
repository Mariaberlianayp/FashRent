<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    public function accept($id){

        DB::table('product')->where('product.product_id',$id)->update([
            'product_status' => 2,
        ]);

        return redirect()->back()->with('acc','Image Has Been Accepted');
    }


    public function decline($id){

        DB::table('product')->where('product.product_id',$id)->update([
            'product_status' => 3,
        ]);

        return redirect()->back()->with('dec','Image Has Been Declined');
    }
}
