<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/karyawan';
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];
        return view('karyawan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $no_induk = $request->get('no_induk');
        $nama = $request->get('nama');
        $alamat = $request->get('alamat');
        $tgl_lahir = $request->get('tgl_lahir');
        $tgl_bergabung = $request->get('tgl_bergabung');

        $parameter = [
            'no_induk'=>$no_induk,
            'nama' => $nama,
            'alamat'=> $alamat,
            'tgl_lahir'=> $tgl_lahir,
            'tgl_bergabung'=> $tgl_bergabung,
        ];

        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/karyawan';

        $client->request('POST', $url, [
            'headers' => ['Content-type' => 'application/json'],
            'body'=> json_encode($parameter)
        ]);
        return redirect()->route('karyawan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/karyawan/'.$id;
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];
        return view('karyawan.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/karyawan/'.$id;
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        // dd($content);
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];
        return view('karyawan.edit', compact('data'));
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
        $no_induk = $request->get('no_induk');
        $nama = $request->get('nama');
        $alamat = $request->get('alamat');
        $tgl_lahir = $request->get('tgl_lahir');
        $tgl_bergabung = $request->get('tgl_bergabung');

        $parameter = [
            'no_induk'=>$no_induk,
            'nama' => $nama,
            'alamat'=> $alamat,
            'tgl_lahir'=> $tgl_lahir,
            'tgl_bergabung'=> $tgl_bergabung,
        ];

        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/karyawan/'.$id;

        $client->request('PUT', $url, [
            'headers' => ['Content-type' => 'application/json'],
            'body'=> json_encode($parameter)
        ]);
        return redirect()->route('karyawan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/karyawan/'.$id;

        $client->request('DELETE', $url);
        return redirect()->route('karyawan.index');
    }

    public function getTerbaru()
    {
        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/karyawan/getTerbaru';
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];
        return view('karyawan.index', compact('data'));
    }


    public function getSisaCuti()
    {
        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/karyawan/getSisaCuti';
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];
        return view('cuti.sisa-cuti', compact('data'));
    }
}
