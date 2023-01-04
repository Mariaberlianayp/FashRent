<?php

namespace App\Http\Controllers;

use App\Models\categoryModel;
use App\Models\productModel;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class shopController extends Controller
{

    public function showKelola($id)
    {
            $data = productModel::where('product.shop_id','=',$id)
            ->paginate(6);

        return view('kelolaproduk',['data'=>$data]);
    }

    public function showTambahProduk()
    {

        $data = categoryModel::all();

        return view('addproduk',['data'=>$data]);
    }

    public function addProduk(Request $request)
    {
        // dd($request);

        $validated = $request->validate([
            'namaproduk' => ['required','string'],
            'sewahari' => ['required','numeric','gte:0'],
            'deposito' => ['required','numeric','gte:0'],
            'qty' => ['required'],
            'kategori' => ['required'],
            'gender' => ['required'],
            'warna' => ['required','string'],
            'ukuran' => ['required','string'],
            'deskripsi' => ['required','string','min:30'],
            'images' =>['required'],
            'images.*' => ['file','image'],
        ]);




        $shop_id_now=DB::table('shop')->where('shop.id',Auth::user()->id)
        ->first();



        DB::table('product')->insert([
            'shop_id' => $shop_id_now->shop_id,
            'category_id' => $validated['kategori'],
            'product_name' => $validated['namaproduk'],
            'product_description' => $validated['deskripsi'],
            'product_rentprice' => $validated['sewahari'],
            'product_deposito' => $validated['deposito'],
            'product_gender' => $validated['gender'],
            'product_color' => $validated['warna'],
            'product_size' => $validated['ukuran'],
            'product_stock' => $validated['qty'],
        ]);

        $product_id_now=DB::table('product')->latest('product_id')->first();



        foreach($request->file('images') as $imageFile){

            $imageName = time().'_'.$imageFile->getClientOriginalName();
            Storage::putFileAs('public/images',$imageFile, $imageName);
            $imagePath = 'images/'.$imageName;

            DB::table('product_image')->insert([
                'product_id' =>$product_id_now->product_id,
                'product_photo' =>$imagePath,
            ]);

        }

        $id = Auth::user()->id;

        return redirect('/addproduk')->with('add','Berhasil Menambahkan Produk!');
    }


    public function deleteProduct($id)
    {

        DB::table('product')->where('product.product_id',$id)->delete();


        return redirect()->back()->with('deleteProduk','Produk Berhasil Dihapus!');

    }

    public function editProduct($id){

        $data=DB::table('product')->where('product.product_id',$id)->first();

        $images = DB::table('product_image')->where('product_image.product_id',$id)->get();

        $categories = categoryModel::all();

        return view('editproduk',['data'=>$data,'images'=>$images,'categories'=>$categories]);

    }


}
