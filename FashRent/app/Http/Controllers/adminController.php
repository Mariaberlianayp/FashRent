<?php

namespace App\Http\Controllers;

use App\Models\bannerModel;
use App\Models\shopModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class adminController extends Controller
{
    public function accept($id){

        DB::table('product')->where('product.product_id',$id)->update([
            'product_status' => 2,
            'admin_id' => Auth::user()->id
        ]);

        return redirect()->back()->with('acc','Image Has Been Accepted');
    }


    public function decline($id){

        DB::table('product')->where('product.product_id',$id)->update([
            'product_status' => 3,
            'admin_id' => Auth::user()->id
        ]);

        return redirect()->back()->with('dec','Image Has Been Declined');
    }

    public function showBanner(){
        $data = bannerModel::paginate(3);

        return view('addbanner',['data'=>$data]);
    }

    public function addBanner(Request $request){
        $allshop = shopModel::all();

        if($request['shop_id']){
            $validated = $request->validate([
                'shop_id' => ['required','string','in:'.$allshop->implode('shop_id',',')],
                'image' =>['required','file','image'],
            ]);
        }
        else{
            $validated = $request->validate([
                'image' =>['required','file','image'],
            ]);
        }

        $file = $request->file('image');
        $imageName = time().'_'.$file->getClientOriginalName();

        Storage::putFileAs('public/images',$file, $imageName);
        // $path = $validated['image']->storeAs('public/images', $imageName);
        $imagePath = 'images/'.$imageName;
        // dd($imagePath);

        if($request['shop_id']){
            DB::table('banner')->insert([
                'admin_id' => Auth::user()->id,
                'shop_id' => $validated['shop_id'],
                'banner_image' =>$imagePath,
            ]);
        }
        else{
            DB::table('banner')->insert([
                'admin_id' => Auth::user()->id,
                'banner_image' =>$imagePath,
            ]);
        }



        return redirect()->back()->with('suc','Banner Image Has Been Added!');
    }

    public function deleteBanner($id){

        DB::table('banner')->where('banner.banner_id',$id)->delete();


        return redirect()->back()->with('del','Banner Image Has Been Deleted!');
    }

}
