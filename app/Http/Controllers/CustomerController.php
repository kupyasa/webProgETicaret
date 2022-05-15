<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $urun
     * @return \Illuminate\Http\Response
     */
    public function edit(User $customer)
    {
        return view('customer.bilgilerim',['user' => User::where([['id','=',auth()->user()->id]])->first()]);
    }
    
    public function update(Request $request)
    {
       
        $request->validate([
            'image' => 'image'
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
        $user->is_active = $request->is_active;
        $user->image = $imagename;
        $user->adres = $request->adres;
        $user->save();

        return redirect(url('/bilgilerim'));
    }
}
