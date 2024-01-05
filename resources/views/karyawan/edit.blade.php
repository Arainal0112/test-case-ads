@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Karyawan</h5>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('karyawan.update', $data['id']) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="no_induk" class="form-label">No Induk</label>
                            <input type="text" class="form-control" name="no_induk" id="no_induk"
                                aria-describedby="no_induk" value="{{$data['no_induk']}}">
                            <div id="no_induk" class="form-text">Masukkan no induk maksimal 7 karakter .</div>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="{{$data['nama']}}">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" value="{{$data['alamat']}}">
                        </div>
                        <div class="mb-3">
                            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="{{$data['tgl_lahir']}}">
                        </div>
                        <div class="mb-3">
                            <label for="tgl_bergabung" class="form-label">Tanggal Bergabung</label>
                            <input type="date" class="form-control" name="tgl_bergabung" id="tgl_bergabung" value="{{$data['tgl_bergabung']}}">
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
