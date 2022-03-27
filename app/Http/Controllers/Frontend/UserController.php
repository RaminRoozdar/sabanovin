<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Province;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
     public function profile()
    {
        $user = User::findOrFail(Auth::user()->id);
        $provinces = Province::all();
        if(Auth::user()->province_id) {
            $cities = City::where('province_id', Auth::user()->province_id)->get();
        } else {
            $cities = City::where('province_id', $provinces->first()->id)->get();
        }
        return view('frontend.user.profile',compact('user','provinces','cities'));
    }
    public function cities(Request $request)
    {
        $cities = City::where('province_id', $request->province_id)->get();
        return response()->json($cities);
    }

    public function store(Request $request)
    {
        $request->validate([
                'email' => 'required|email|unique:users,email,' . Auth::user()->id,
                'zip_code' => 'required|numeric',
                'address' => 'required|string',
        ]);
            $user = User::findOrFail(Auth::user()->id);
            $user->email = $request->email;
            $user->zip_code = $request->zip_code;
            $user->address = $request->address;
            $user->city_id = $request->city_id;
            $user->province_id = $request->province_id;
            $user->active = 'yes';
            $user->save();
            session()->flash('color', 'success');
            session()->flash('message', 'اطلاعات با موفقیت بروز شد.');
            return redirect()->route('user.profile');

    }


}
