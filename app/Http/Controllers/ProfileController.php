<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
                $this->middleware('block');

        $this->middleware('type');
        $this->middleware('guest');
    }

    public function index($id)
    {
        if ($id != Auth::user()->id) {
            return "error";
        };
        if(Auth::user()->type == 2){
            return redirect('inves_profile/profile_detail/'.Auth::user()->id);
        }
        $profile = User::where('id', Auth::user()->id)->first();

        return view('profile.profile_detail', ['data' => $profile]);

    }



    public function inves_index($id)
    {
        if ($id != Auth::user()->id) {
            return "error";
        };
        if(Auth::user()->type == 1){
            return redirect('entra/profile_detail/'.Auth::user()->id);
        }
        $profile = User::where('id', Auth::user()->id)->first();

        return view('profile.inves.profile_detail', ['data' => $profile]);

    }


    public function update($id, Request $request)
    {
        if ($id != Auth::user()->id) {
            return "error";
        };
        $data = User::where('id', $id)->first();
        $data->name = $request->name;
        $data->email = $request->email;

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::user()->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data->save();

        return redirect('entra/profile_detail/' . $id)->with('status', 'Your profile is has been updated!');
    }



    public function inves_update($id, Request $request)
    {
        if ($id != Auth::user()->id) {
            return "error";
        };
        $data = User::where('id', $id)->first();
        $data->name = $request->name;
        $data->email = $request->email;

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::user()->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data->save();

        return redirect('inves_profile/profile_detail/' . $id)->with('status', 'Your profile is has been updated!');
    }


}