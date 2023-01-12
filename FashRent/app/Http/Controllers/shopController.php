<?php

namespace App\Http\Controllers;

use App\Models\categoryModel;
use App\Models\degreephotoModel;
use App\Models\productfeedbackModel;
use App\Models\productimageModel;
use App\Models\productModel;
use App\Models\shopModel;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class shopController extends Controller
{

    public function showKelola()
    {
        $shop_now = DB::table('shop')->where('shop.id',Auth::user()->id)->first();

            $data = productModel::where('product.shop_id','=',$shop_now->shop_id)
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



        foreach($request->file('images') as $imageFile){


            $imageName = time().'_'.$imageFile->getClientOriginalName();
            Storage::putFileAs('public/images',$imageFile, $imageName);
            $imagePath = 'images/'.$imageName;

            $thumbnail=$imagePath;

            break;
        }

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
            'product_thumbnail' => $thumbnail,
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




        return redirect('/shop/produk')->with('add','Berhasil Menambahkan Produk!');
    }


    public function deleteProduct($id)
    {

        DB::table('product')->where('product.product_id',$id)->delete();


        return redirect()->back()->with('deleteProduk','Produk Berhasil Dihapus!');

    }

    public function showeditProduct($id){

        $data=DB::table('product')->where('product.product_id',$id)->first();

        $images = DB::table('product_image')->where('product_image.product_id',$id)->get();

        $categories = categoryModel::all();

        // dd($data);

        return view('editproduk',['data'=>$data,'images'=>$images,'categories'=>$categories]);

    }

    public function editProduct(Request $request){

        // dd($request);

        if($request->file('images')){
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

        }
        else{
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
            ]);
        }



        $shop_id_now=DB::table('shop')->where('shop.id',Auth::user()->id)
        ->first();



            foreach($request->file('images') as $imageFile){


                $imageName = time().'_'.$imageFile->getClientOriginalName();
                Storage::putFileAs('public/images',$imageFile, $imageName);
                $imagePath = 'images/'.$imageName;

                $thumbnail=$imagePath;

                break;
            }

            DB::table('product')->where('product.product_id',$request['product_id'])->update([
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
                'product_thumbnail' => $thumbnail,
            ]);




        $product_id_now=$request['product_id'];


        if($request->file('images')){
            foreach($request->file('images') as $imageFile){

                $imageName = time().'_'.$imageFile->getClientOriginalName();
                Storage::putFileAs('public/images',$imageFile, $imageName);
                $imagePath = 'images/'.$imageName;

                DB::table('product_image')->insert([
                    'product_id' =>$product_id_now,
                    'product_photo' =>$imagePath,
                ]);

            }
        }


        return redirect('/shop/produk')->with('edit','Berhasil Merubah Data Produk!');
    }


    public function deletePhoto($id){

    $get_id = DB::table('product_image')->where('product_image.photo_id',$id)->first();

    if(count(DB::table('product_image')->where('product_image.product_id',$get_id->product_id)->get())==1){
        return redirect()->back()->with('delfoto2','Minimal mempunyai satu foto product');
       }

    $data_now = DB::table('product_image')->where('product_image.product_id',$get_id->product_id)->get();



        DB::table('product_image')->where('product_image.photo_id',$id)->delete();

        foreach($data_now as $img){

            $thumbnail=$img->product_photo;

            break;
        }

    DB::table('product')->where('product.product_id',$get_id->product_id)->update([
        'product_thumbnail' => $thumbnail,
    ]);

        return redirect()->back()->with('delfoto','Foto Berhasil Dihapus!');

    }

    public function showDetailToko($id){


        $shop = DB::table('shop')->where('shop.shop_id',$id)->first();

        $photos = productimageModel::all();

        $products = DB::table('product')->where('product.shop_id',$id)->get();

        $productfeedback = DB::table('product_feedback')->get();

        $count=0;

        $stars=0;

        $users=User::all();


        return view('detailtoko',['toko'=>$shop,'photos'=>$photos,'products'=>$products,'count'=>$count,'stars'=>$stars,'productfeedback'=>$productfeedback,'users'=>$users]);

     }

     public function view360photo($id){


        $id_product=$id;

        $data=DB::table('product')->where('product.product_id',$id_product)
        ->first();

        return view('add360Image',['id'=>$id_product,'data'=>$data]);

     }

     public function productDetail($id)
     {
         $product = productModel::where('product_id', $id)->first();
         $toko = shopModel::where('shop_id', $product->shop_id)->first();
         $category = categoryModel::where('category_id', $product->category_id)->first();
         $degreephotos = degreephotoModel::where('360_photo.product_id',$id)->get();
         $productfeedback = DB::table('product_feedback')->join('renter','renter.renter_id','=','product_feedback.renter_id')
         ->where('product_feedback.product_id',$id)->get();

         $count=0;

         $stars=0;

         $stars_avg=0;

         $users= User::all();


         if(count($productfeedback)>0){
            foreach($productfeedback as $p){
                $stars=$stars+$p->rating_stars;
                $count++;
             }

             $stars_avg = $stars/$count;
         }

         return view('detail', compact('product', 'toko','category','degreephotos','productfeedback','count','stars_avg','users'));
     }
     public function seestatis($id)
     {
         $product = productModel::where('product_id', $id)->first();
         $toko = shopModel::where('shop_id', $product->shop_id)->first();
         $category = categoryModel::where('category_id', $product->category_id)->first();
         $degreephotos = degreephotoModel::where('360_photo.product_id',$id)->get();
         $productfeedback = DB::table('product_feedback')->join('renter','renter.renter_id','=','product_feedback.renter_id')
         ->where('product_feedback.product_id',$id)->get();

         $count=0;

         $stars=0;

         $stars_avg=0;

         $users= User::all();


         if(count($productfeedback)>0){
            foreach($productfeedback as $p){
                $stars=$stars+$p->rating_stars;
                $count++;
             }

             $stars_avg = $stars/$count;
         }

         return view('detail', compact('product', 'toko','category','degreephotos','productfeedback','count','stars_avg','users'));
     }

     public function viewAllShop(){

        $shops = shopModel::all();
        $users = User::all();
        $products = productModel::all();
        $productfeedback = productfeedbackModel::all();

        return view('allshop',['shops'=>$shops,'users'=>$users,'products'=>$products,'productfeedback'=>$productfeedback]);
    }

    public function add360photo(Request $request){

        $validated = $request->validate([
            'images' =>['required'],
            'images.*' => ['file','image'],
        ]);

        foreach($request->file('images') as $imageFile){


            $imageName = time().'_'.$imageFile->getClientOriginalName();
            Storage::putFileAs('public/images',$imageFile, $imageName);
            $imagePath = 'images/'.$imageName;

            DB::table('360_photo')->insert([
                'product_id'=>$request->product_id,
                'photo360' =>$imagePath,
            ]);

        }

        DB::table('product')->where('product.product_id',$request->product_id)->update([
            'product_status' => 1,
        ]);

        return redirect('/shop/produk')->with('addfoto','Image Has Been Uploaded Successfully');
    }


    function viewfeedback($id){

        $id_product=$id;

        return view('addfeedback',['id'=>$id_product]);
    }

    function addfeedback(Request $request){

        $validated = $request->validate([
            'comment' => ['required','string'],
            'image' =>['required','file','image'],
            'stars' => ['required']
        ]);

        $file = $request->file('image');
        $imageName = time().'_'.$file->getClientOriginalName();

        Storage::putFileAs('public/images',$file, $imageName);
        // $path = $validated['image']->storeAs('public/images', $imageName);
        $imagePath = 'images/'.$imageName;
        // dd($imagePath);

        $renter_now = DB::table('renter')->where('renter.id',Auth::user()->id)->first();

        DB::table('product_feedback')->insert([
            'renter_id' => $renter_now->renter_id,
            'product_id' => $request->product_id,
            'rating_stars' => $validated['stars'],
            'rating_date' => date("Y-m-d H:i:s"),
            'rating_description' => $validated['comment'],
            'rating_photo' => $imagePath
        ]);


        return redirect()->back()->with('addcomment','Feedback has been added!');
    }

}
