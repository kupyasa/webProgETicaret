<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminCustomerController extends Controller
{
    public function index()
    {
        return view('admin.customers', ['customers' => User::where('is_admin', '=', false)->get()]);
    }

    public function edit(User $user)
    {
        return view('admin.customeredit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'image' => 'required|image'
        ]);

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
        $user->is_active = $request->is_active;
        $user->image = $imagename;
        $user->adres = $request->adres;

        $user->save();

        return redirect(route('admin.customers'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect(url('/admin/kullanicilar'));
    }
}
