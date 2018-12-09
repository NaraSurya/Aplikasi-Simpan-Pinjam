<?php

namespace App\Http\Controllers;

use App\anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggotas = anggota::all();
        foreach($anggotas as $anggota){
            $anggota['saldo']= $anggota->saldo();
        }       
        return view('anggota.index' , ['anggotas'=> $anggotas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'no_ktp' => 'required|numeric' , 
            'nama' => 'required' , 
            'alamat' => 'required' , 
            'no_tlp' => 'required' , 
            'jenis_kelamin' => 'required' , 
            'tgl_lahir' => 'required' , 
            'user_id' => 'required' , 
            'foto_profile' => 'required'
        ]);
        
        
        
        

        if($request->hasFile('foto_profile')){
            $fileName = $request->no_ktp.'_profile';
            $fileExtension = $request->file('foto_profile')->getClientOriginalExtension();
            $fileNameToStorage = $fileName.'_'.time().'.'.$fileExtension;
            $filePath = $request->file('foto_profile')->storeAs('public/anggota' , $fileNameToStorage); 
        } 
        else {
            $filePath = 'NULL';
        }
        
        $anggota = anggota::create([ 
            'no_ktp' => $request->no_ktp , 
            'nama' => $request->nama , 
            'alamat' => $request->alamat , 
            'no_tlp' => $request->no_tlp , 
            'jenis_kelamin' => $request->jenis_kelamin , 
            'tgl_lahir' => $request->tgl_lahir , 
            'user_id' => $request->user_id , 
            'foto_profile'=> $fileNameToStorage
        ]);

        $anggota->no_anggota = $anggota->generate_no_anggota(); 
        $anggota->save();

        return redirect('/anggota');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anggota = anggota::find($id);
        return view('anggota.show' , ['anggota'=> $anggota]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $anggota = anggota::find($id);
        return view('anggota.edit' , ['anggota'=>$anggota]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $anggota = anggota::find($id);
        $this->validate($request , [
            'no_ktp' => 'required|numeric' , 
            'nama' => 'required' , 
            'alamat' => 'required' , 
            'no_tlp' => 'required' , 
            'jenis_kelamin' => 'required' , 
            'tgl_lahir' => 'required' , 
            'user_id' => 'required' , 
            'foto_profile' => 'required'
        ]);
        
        if($request->hasFile('foto_profile')){
            $fileName = $anggota->no_anggota.'_profile';
            $fileExtension = $request->file('foto_profile')->getClientOriginalExtension();
            $fileNameToStorage = $fileName.'_'.time().'.'.$fileExtension;
            $filePath = $request->file('foto_profile')->storeAs('public/anggota' , $fileNameToStorage); 
        } 
        else {
            $filePath = 'NULL';
        }
        
        $anggota->nama = $request->nama;
        $anggota->no_ktp = $request->no_ktp; 
        $anggota->alamat = $request->alamat; 
        $anggota->no_tlp = $request->no_tlp; 
        $anggota->jenis_kelamin = $request->jenis_kelamin; 
        $anggota->tgl_lahir = $request->tgl_lahir; 
        $anggota->foto_profile = $fileNameToStorage; 
        $anggota->user_id = $request->user_id; 
        $anggota->save();
        return redirect('/anggota/'.$anggota->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anggota = anggota::find($id);
        $anggota->delete();
        return redirect('/anggota'); 
    }

    public function search(Request $request){
        $search = $request->search;
        $anggotas = anggota::where('no_anggota' , 'like' , '%'.$search.'%')
                            ->orWhere('nama' , 'like' , '%'.$search.'%') 
                            ->orWhere('alamat' , 'like' , '%'.$search.'%')
                            ->orWhere('no_ktp' , 'like' , '%'.$search.'%')
                            ->orWhere('no_tlp' , 'like' , '%'.$search.'%')
                            ->orWhere('tgl_lahir' , 'like' , '%'.$search.'%')->get();
        return view('anggota.resultSearch', ['anggotas'=>$anggotas]);
    }
}
