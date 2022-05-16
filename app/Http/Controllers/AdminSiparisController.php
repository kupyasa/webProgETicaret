<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siparis;

class AdminSiparisController extends Controller
{
    public function index()
    {
        
        return view('admin.siparisler', ['siparisler' => Siparis::groupBy('siparis_kod')->groupBy('id')->get()]);
    }

    public function edit($siparis_kod)
    {
        
        return view(
            'admin.siparisduzenle',
            [
                'siparisler' => Siparis::where([['siparis_kod', '=', $siparis_kod]])->get(),
                'toplam' => Siparis::where([['siparis_kod', '=', $siparis_kod]])->sum('fiyat'),
                'durum' => Siparis::where([['siparis_kod', '=', $siparis_kod]])->first()->durum,
                'siparis_kod' => $siparis_kod
            ]
        );
    }

    public function update(Request $request,$siparis_kod)
    {
    
        Siparis::where('siparis_kod','=',$siparis_kod)->update(['durum'=> $request->durum]);
        
        return redirect(route('admin.siparisler'));
    }

   
}
