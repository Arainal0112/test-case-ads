<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\Cuti;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = Karyawan::all();

        return response()->json([
            'status' => true,
            'message' => 'Data Ditemukan',
            'data' => $karyawan,
        ], 200);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $karyawan = new Karyawan;
        $valid = [
            'no_induk' => 'required|unique:karyawan',
            'nama' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'tgl_bergabung' => 'required',
        ];
        $validator = Validator::make($request->all(), $valid);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Gagal Memasukkan Data',
                'data' => $validator->errors(),
            ]);
        }
        $karyawan->no_induk = $request->no_induk;
        $karyawan->nama = $request->nama;
        $karyawan->alamat = $request->alamat;
        $karyawan->tgl_lahir = $request->tgl_lahir;
        $karyawan->tgl_bergabung = $request->tgl_bergabung;
        $karyawan->save();

        return response()->json([
            'message' => 'Data Berhasil ditambahkan',
            'data' => $karyawan,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $karyawan = Karyawan::find($id);
        if ($karyawan) {
            return response()->json([
                'status' => true,
                'message' => 'Data ditemukan',
                'data' => $karyawan,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Data tidak ditemukan',
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'no_induk' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'tgl_bergabung' => 'required',
        ]);
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Data ditemukan',
            'data' => $karyawan,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Karyawan::destroy($id);
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dihapus',
        ], 200);
    }

    public function getTerbaru()
    {
        $karyawan = Karyawan::orderBy('tgl_bergabung', 'desc')->limit(3)->get();
        if ($karyawan) {
            return response()->json([
                'status' => true,
                'message' => 'Data ditemukan',
                'data' => $karyawan,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Data tidak ada',
            ]);
        }
    }
    public function getcuti(){
        $cuti = Cuti::all();
        return response()->json([
            'status' => true,
            'message' => 'Data Ditemukan',
            'data' => $cuti,
        ], 200);
    }

    public function getSisaCuti()
    {
        $tahun = Carbon::now()->year;

        $karyawanList = Karyawan::with('cuti')->get();

        $data = [];

        foreach ($karyawanList as $karyawan) {
            $cutiTerpakai = $karyawan->cuti->where('tgl_cuti', '>=', Carbon::create($tahun, 1, 1))->sum('lama_cuti');

            $sisaCuti = max(0, 12 - $cutiTerpakai);

            $data[] = [
                'karyawan' => $karyawan,
                'sisa_cuti' => $sisaCuti,
            ];
        }

        return response()->json([
            'message' => 'Data ditemukan',
            'data' => $data,
        ], 200);
    }
}
