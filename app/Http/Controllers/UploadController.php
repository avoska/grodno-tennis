<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Image;
use Auth;
use Illuminate\Support\Facades\DB;
use \Input as Input;

class UploadController extends Controller
{

    public function upload(Request $request)
    {


        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));


            DB::table('users')->where('id', $request->id)->update(['avatar' => $filename]);
            //		$user= Auth::user();
            //		$user->avatar = $filename;
            //		$user->save();


        }

        return redirect('personal-data');
    }

    public function admin_upload_avatar(Request $request)
    {


        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));


            DB::table('users')->where('id', $request->id)->update(['avatar' => $filename]);
            //		$user= Auth::user();
            //		$user->avatar = $filename;
            //		$user->save();


        }
        $address='admin-searched-player/' . $request->id . '?';
        //dd($a);
        return redirect($address);
        //return redirect ('admin-searched-player');
    }
}
