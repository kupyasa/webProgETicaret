<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function edit(User $admin)
    {
        return view('admin.bilgilerim',['user' => User::where([['id','=',auth()->user()->id]])->first()]);
    }
    
    public function update(Request $request)
    {
        
        $request->validate([
            'image' => 'required|image'
        ]);


        $user = User::find(auth()->user()->id);

        $imagename = null;

        if ($request->hasFile('image')) {
            $imagename = date('dmYHi') . $request->image->getClientOriginalName();
            $request->image->move(public_path('images/profiles'), $imagename);
            if (File::exists(public_path('images/profiles/' . $user->image))) {
                File::delete(public_path('images/profiles/' . $user->image));
            }
        } else {
            $imagename = $user->image;
        }

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->image = $imagename;
        $user->adres = $request->adres;
        
        $user->save();

        return redirect(route('admin.bilgilerim'));
    }
}

