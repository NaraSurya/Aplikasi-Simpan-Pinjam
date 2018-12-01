<?php

namespace App\Http\Controllers;

use App\Simpanan;
use App\JenisTransaksi;
use Illuminate\Http\Request;

class SimpananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $simpanans = Simpanan::get();
        return view('simpanan.list',['simpanans'=>$simpanans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $simpanans = Simpanan::get();
        $traks = JenisTransaksi::get();
        return view('simpanan.create',['simpanans'=>$simpanans,'traks' => $traks]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'id' => 'required',
            'nominal' => 'required',
            'tanggal' => 'required',
            'jenis' => 'required'
        ]);
        $simpanan = Simpanan::create([
            'anggota_id' => $request->id,
            'tanggal' => $request->tanggal,
            'jenis_transaksi' => $request->jenis,
            'nominal_transaksi' => $request->nominal,
            'user_id' => 1
        ]);

        return redirect('/simpanan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Simpanan  $simpanan
     * @return \Illuminate\Http\Response
     */
    public function show(Simpanan $simpanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Simpanan  $simpanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Simpanan $simpanan)
    {
        $traks = JenisTransaksi::get();
        return view('simpanan.edit',['simpanan'=> $simpanan,'traks' => $traks]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Simpanan  $simpanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Simpanan $simpanan)
    {
       
        $this->validate($request, [
            'id' => 'required',
            'nominal' => 'required',
            'tanggal' => 'required',
            'jenis' => 'required'
        ]);
        
            $simpanan->anggota_id = $request->id;
            $simpanan->tanggal = $request->tanggal;
            $simpanan->jenis_transaksi = $request->jenis;
            $simpanan->nominal_transaksi = $request->nominal;
            $simpanan->user_id = 1;
            $simpanan->save();

            return redirect('/simpanan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Simpanan  $simpanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Simpanan $simpanan)
    {
        $simpanan->delete();
        return redirect('/simpanan');
    }
}
