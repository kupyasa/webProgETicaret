<?php

namespace App\Http\Controllers;

use App\Models\Siparis;
use App\Models\Sepet;
use App\Http\Requests\StoreSiparisRequest;
use App\Http\Requests\UpdateSiparisRequest;
use Illuminate\Support\Str;

class SiparisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   // 
        return view('customer.siparislerim',['siparisler' => Siparis::where([['user_id','=',auth()->user()->id]])->groupBy('siparis_kod')->groupBy('id')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSiparisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSiparisRequest $request)
    {
        $siparis_kod = '';
        do {
            $siparis_kod = Str::uuid()->toString();
        } while (Siparis::where([['siparis_kod', '=', $siparis_kod]])->first());

        $sepets = Sepet::where([['user_id','=',auth()->user()->id]])->get();
        foreach ($sepets as $sepet) {
           $siparis = Siparis::make([
                'siparis_kod' => $siparis_kod,
                'user_id' => $sepet->user_id,
                'urun_id' => $sepet->urun_id,
                'adet' => $sepet->adet,
                'fiyat' => $sepet->fiyat,
                'durum' => 'Beklemede',

            ]);

            $sepet->urun->decrement('stok',$sepet->adet);

            Sepet::where('id',$sepet->id)->delete();

            $siparis->save();

        }
        return redirect(url('/'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siparis  $siparis
     * @return \Illuminate\Http\Response
     */
    public function show($siparis_kod)
    {
        return view('customer.siparisim', 
        ['siparisler' => Siparis::where([['user_id', '=', auth()->user()->id],['siparis_kod','=',$siparis_kod]])->get(), 
        'toplam' => Siparis::where([['user_id', '=', auth()->user()->id],['siparis_kod','=',$siparis_kod]])->sum('fiyat'),
    'durum' => Siparis::where([['user_id', '=', auth()->user()->id],['siparis_kod','=',$siparis_kod]])->first()->durum]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siparis  $siparis
     * @return \Illuminate\Http\Response
     */
    public function edit(Siparis $siparis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSiparisRequest  $request
     * @param  \App\Models\Siparis  $siparis
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSiparisRequest $request, Siparis $siparis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siparis  $siparis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siparis $siparis)
    {
        //
    }
}
