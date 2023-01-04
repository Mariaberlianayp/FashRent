<?php

namespace App\Http\Controllers;

use App\Models\categoryModel;
use App\Models\productimageModel;
use App\Models\productModel;
use App\Models\shopModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class afterRegisterController extends Controller
{

    public function index()
    {

        $categories = categoryModel::all();

        $shops = shopModel::all();

        $products = productModel::all();

        $photos = productimageModel::all();


        return view('home',['categories'=>$categories,'shops'=>$shops,'products'=>$products,'photos'=>$photos]);
    }

    public function inputAfterRegister(Request $request)
    {
        // dd($request);
        $role = Auth::user()->User_Priority;
        if($role === 3){
            $validated = $request->validate([
                'name' => ['required','string','min:3'],
                'NoTelepon' => ['required','numeric','min:10'],
                'image' => ['required', 'file', 'image'],
            ]);
        }
        else if($role === 2){
            $validated = $request->validate([
                'namapemilik' => ['required','string','min:3'],
                'namatoko' => ['required','string'],
                'address' => ['required','string'],
                'deskripsi' => ['required','string','min:30'],
                'NoTelepon' => ['required','numeric','min:10'],
                'image' => ['required', 'file', 'image'],
            ]);
        }






        $file = $request->file('image');
        $imageName = time().'_'.$file->getClientOriginalName();

        Storage::putFileAs('public/images',$file, $imageName);
        // $path = $validated['image']->storeAs('public/images', $imageName);
        $imagePath = 'images/'.$imageName;
        // dd($imagePath);

        if($role === 3){
            DB::table('renter')->insert([
                'id' =>Auth::user()->id,
                'renter_name' => $validated['name'],
                'renter_phonenumber' => $validated['NoTelepon'],
                'renter_photoprofile' => $imagePath,
            ]);

        }

        if($role === 2){
            DB::table('shop')->insert([
                'id' =>Auth::user()->id,
                'shop_ownername' => $validated['namapemilik'],
                'shop_address' => $validated['address'],
                'shop_shopname' => $validated['namatoko'],
                'shop_phonenumber' => $validated['NoTelepon'],
                'shop_city' => $request['kota'],
                'shop_description' => $validated['deskripsi'],
                'shop_photoprofile' => $imagePath,
            ]);

        }

        DB::table('users')->where('id',Auth::user()->id)->update([
            'User_Status' => 1,
        ]);


        return redirect('/');
    }
}
