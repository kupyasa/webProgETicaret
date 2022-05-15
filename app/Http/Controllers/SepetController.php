<?php

namespace App\Http\Controllers;

use App\Models\Sepet;
use App\Models\Urun;
use App\Http\Requests\StoreSepetRequest;
use App\Http\Requests\UpdateSepetRequest;

class SepetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('customer.sepetim', 
        ['sepets' => Sepet::where([['user_id', '=', auth()->user()->id]])->get(), 
        'toplam' => Sepet::where([['user_id', '=', auth()->user()->id]])->sum('fiyat')]);
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
     * @param  \App\Http\Requests\StoreSepetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSepetRequest $request)
    {

        $sepet = Sepet::where([['user_id', '=', auth()->user()->id], ['urun_id', '=', request()->urun_id]])->first();
        if ($sepet) {
            if (($sepet->adet + $request->adet) <= $sepet->urun->stok && $sepet->urun->stok!=0) {
                $sepet->increment('adet', request()->adet);
                $sepet->increment('fiyat', (request()->adet * request()->fiyat));

                return redirect(url('/'));
            }
        } else {
            if (Urun::where('id',request()->urun_id)->first()->stok !=0) {
                $sepet = Sepet::make([
                    'user_id' => auth()->user()->id,
                    'urun_id' => request()->urun_id,
                    'adet' => request()->adet,
                    'fiyat' => (request()->adet * request()->fiyat)
                ]);
    
                $sepet->save();
    
                return redirect(url('/'));
            }
            
        }
        return redirect(url('/'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sepet  $sepet
     * @return \Illuminate\Http\Response
     */
    public function show(Sepet $sepet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sepet  $sepet
     * @return \Illuminate\Http\Response
     */
    public function edit(Sepet $sepet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSepetRequest  $request
     * @param  \App\Models\Sepet  $sepet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSepetRequest $request, Sepet $sepet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sepet  $sepet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sepet $sepet)
    {
        $sepet->delete();

        return redirect(url('/sepetim'));
    }
}
