<?php

namespace App\Http\Controllers;

use App\Models\Urun;
use App\Http\Requests\StoreUrunRequest;
use App\Http\Requests\UpdateUrunRequest;

class UrunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uruns = Urun::where([['satis_durumu', '=', true]]);
        if (request()->get('search')) {
            $uruns = $uruns->where([['ad', 'LIKE', "%" . request()->get('search') . "%"]]);
        }
        $uruns = $uruns->orderByDesc('updated_at')->paginate(6);
        return view('shared.index', ['uruns' => $uruns]);
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
     * @param  \App\Http\Requests\StoreUrunRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUrunRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Urun  $urun
     * @return \Illuminate\Http\Response
     */
    public function show(Urun $urun)
    {
        return view('shared/urun', ['urun' => $urun]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Urun  $urun
     * @return \Illuminate\Http\Response
     */
    public function edit(Urun $urun)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUrunRequest  $request
     * @param  \App\Models\Urun  $urun
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUrunRequest $request, Urun $urun)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Urun  $urun
     * @return \Illuminate\Http\Response
     */
    public function destroy(Urun $urun)
    {
        //
    }
}
