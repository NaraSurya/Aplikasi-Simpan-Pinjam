<?php

namespace App\Http\Controllers;

use App\Simpanan;
use App\anggota;
use App\JenisTransaksi;
use Carbon\Carbon;
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
        return view('simpanan.search',['simpanans'=>$simpanans]);
        // return view('simpanan.list',['simpanans'=>$simpanans]);
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
        $now = Carbon::now()->toDateString();
        
         $this->validate($request, [
            'nominal' => 'required',
            'jenis' => 'required'
        ]);
        $simpanan = Simpanan::create([
            'anggota_id' => $request->anggota_id,
            'tanggal' => $now,
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
        // $id = $request->search;
        // $anggota = anggota::where('no_anggota',$id)->get();

        // if ($anggota) {
        //     return view('simpanan.list_anggota',['anggotas' => $anggota]);
        // } else {
        //    return 'tidak ketemu'; 
        // }
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
        
            $simpanan->anggota_id = $request->anggota_id;
            $simpanan->tanggal = $request->tanggal;
            $simpanan->jenis_transaksi = $request->jenis;
            $simpanan->nominal_transaksi = $request->nominal;
            $simpanan->user_id = 1;
            $simpanan->save();

            return 'Transaksi Berhasil Ditambahkan';
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

    public function search(Request $request){
        $traks = JenisTransaksi::get();
        $id = $request->search;
        $anggotas = anggota::where('no_anggota',$id)->first();
        if ($anggotas) {
            return view('simpanan.list_anggota',['anggotas' => $anggotas, 'traks' => $traks]);
        } else {
           return 'tidak ketemu'; 
        }
    }
    
}
