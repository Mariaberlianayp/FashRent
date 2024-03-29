<?php

namespace App\Http\Controllers;
use App\Models\categoryModel;
use App\Models\shopModel;
use App\Models\productModel;
use App\Models\degreephotoModel;
use App\Models\renterModel;
use App\Models\User;
use App\Rules\MactchOldPassword;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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

    public function afterRegister()
    {

        return view('auth.afterRegister');
    }

    public function editProfile($id)
    {
        if(Auth::user()->User_Priority == 3){
            $data = renterModel::where('renter.id','=',Auth::user()->id)
            ->get();
        }
        else{
            $data = shopModel::where('shop.id','=',Auth::user()->id)
            ->get();
        }

        return view('profil',['data'=>$data]);
    }
    public function profileDetail($id)
    {
        if(Auth::user()->User_Priority == 3){
            $data = renterModel::where('renter.id','=',Auth::user()->id)
            ->get();
        }
        else{
            $data = shopModel::where('shop.id','=',Auth::user()->id)
            ->get();

        }

        return view('profileDetail',['data'=>$data]);
    }

    public function updateProfile(Request $request)
    {
        $role = Auth::user()->User_Priority;

        if($role === 3){
            if($request['image']){
                $validated = $request->validate([
                    'name' => ['required','string','min:3'],
                    'NoTelepon' => ['required','numeric','min:10'],
                    'image' => ['file', 'image'],
                ]);

                $file = $request->file('image');
                $imageName = time().'_'.$file->getClientOriginalName();

                Storage::putFileAs('public/users-avatar/images',$file, $imageName);
                Storage::putFileAs('public/images',$file, $imageName);
                // $path = $validated['image']->storeAs('public/images', $imageName);
                $imagePath = 'images/'.$imageName;
                // dd($imagePath);
            }
            else{
                $validated = $request->validate([
                    'name' => ['required','string','min:3'],
                    'NoTelepon' => ['required','numeric','min:10'],
                ]);
            }

        }
        else if($role === 2){
            if($request['image']){
                $validated = $request->validate([
                    'name' => ['required','string','min:3'],
                    'address' => ['required','string'],
                    'kota' => ['required','string'],
                    'deskripsi' => ['required','string','min:30'],
                    'NoTelepon' => ['required','numeric','min:10'],
                    'image' => ['file', 'image'],
                ]);

                $file = $request->file('image');
                $imageName = time().'_'.$file->getClientOriginalName();

                Storage::putFileAs('public/users-avatar/images',$file, $imageName);
                Storage::putFileAs('public/images',$file, $imageName);
                // $path = $validated['image']->storeAs('public/images', $imageName);
                $imagePath = 'images/'.$imageName;
                // dd($imagePath);
            }
            else{
                $validated = $request->validate([
                    'name' => ['required','string','min:3'],
                    'address' => ['required','string'],
                    'kota' => ['required','string'],
                    'deskripsi' => ['required','string','min:30'],
                    'NoTelepon' => ['required','numeric','min:10'],
                ]);
            }

        }

        if($role === 3){
            if($request['image']){
                DB::table('renter')->where('id',Auth::user()->id)
                ->update([
                    'id' =>Auth::user()->id,
                    'renter_phonenumber' => $validated['NoTelepon'],
                ]);

                DB::table('users')->where('users.id',Auth::user()->id)->update([
                    'name' => $validated['name'],
                    'avatar' =>$imagePath,
                ]);
            }
            else{
                DB::table('renter')->where('id',Auth::user()->id)
                ->update([
                    'id' =>Auth::user()->id,
                    'renter_phonenumber' => $validated['NoTelepon'],
                ]);

                DB::table('users')->where('users.id',Auth::user()->id)->update([
                    'name' => $validated['name'],
                ]);
            }


        }

        if($role === 2){
            if($request['image']){
                DB::table('shop')->where('id',Auth::user()->id)
                ->update([
                    'id' =>Auth::user()->id,
                    'shop_phonenumber' => $validated['NoTelepon'],
                    'shop_city' => $validated['kota'],
                    'shop_description' => $validated['deskripsi'],
                ]);
                DB::table('users')->where('users.id',Auth::user()->id)->update([
                    'name' => $validated['name'],
                    'avatar' =>$imagePath,
                ]);
            }
            else{
                DB::table('shop')->where('id',Auth::user()->id)
                ->update([
                    'id' =>Auth::user()->id,
                    'shop_phonenumber' => $validated['NoTelepon'],
                    'shop_city' => $validated['kota'],
                    'shop_description' => $validated['deskripsi'],
                ]);
                DB::table('users')->where('users.id',Auth::user()->id)->update([
                    'name' => $validated['name'],
                ]);
            }


        }


        return redirect('/profileDetail/{id}')->with('update','Profile Successfully Updated!');
    }

    public function editPassword(Request $request){

        $validated = $request->validate([
            'password_lama' => ['required', new MactchOldPassword],
            'password_baru' => ['required'],
            'password-confirm' =>['same:password_baru'],
        ]);


        DB::table('users')->where('id',Auth::user()->id)->update([
            'password' => Hash::make($validated['password_baru']),
        ]);

        return redirect('/profil/{id}')->with('update_password','Password Changed Successfully!');
    }

}
