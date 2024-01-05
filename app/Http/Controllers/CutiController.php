<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuti = Cuti::all();
        return view('cuti.index', compact('cuti'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karyawan = Karyawan::all();
        return view('cuti.create', compact('karyawan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'karyawan' => 'required',
            'tgl_cuti' => 'required',
            'lama_cuti' => 'required',
            'keterangan' => 'required',
        ]);

        $cuti = new Cuti;
        $cuti->karyawan_id = $request->get('karyawan');
        $cuti->tgl_cuti = $request->get('tgl_cuti');
        $cuti->lama_cuti = $request->get('lama_cuti');
        $cuti->keterangan = $request->get('keterangan');

        $cuti->save();

        return redirect()->route('cuti.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cuti = Cuti::find($id);
        return view('cuti.edit', compact('cuti'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tgl_cuti' => 'required',
            'lama_cuti' => 'required',
            'keterangan' => 'required',
        ]);

        $cuti = Cuti::find($id);
        $cuti->tgl_cuti = $request->get('tgl_cuti');
        $cuti->lama_cuti = $request->get('lama_cuti');
        $cuti->keterangan = $request->get('keterangan');

        $cuti->save();

        return redirect()->route('cuti.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cuti::destroy($id);
        return redirect()->route('cuti.index');
    }
}
