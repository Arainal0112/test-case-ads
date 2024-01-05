@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Karyawan</h5>
                <a href="{{route('karyawan.create')}}" class="btn btn-primary">Tambah Karyawan</a>
                <a href="{{route('karyawan.terbaru')}}" class="btn btn-warning">3 Karyawan Terbaru</a>
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom">
                                    <h6 class="fw-semibold mb-0">No</h6>
                                </th>
                                <th class="border-bottom">
                                    <h6 class="fw-semibold mb-0">No induk</h6>
                                </th>
                                <th class="border-bottom">
                                    <h6 class="fw-semibold mb-0">Nama</h6>
                                </th>
                                <th class="border-bottom">
                                    <h6 class="fw-semibold mb-0">Alamat</h6>
                                </th>
                                <th class="border-bottom">
                                    <h6 class="fw-semibold mb-0">Tanggal Lahir</h6>
                                </th>
                                <th class="border-bottom">
                                    <h6 class="fw-semibold mb-0">Tanggal Bergabung</h6>
                                </th>
                                <th class="border-bottom">
                                    <h6 class="fw-semibold mb-0">Aksi</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $Karyawan)
                                
                            <tr>
                                <td class="border-bottom">
                                    <h6 class="fw-semibold mb-0">{{$loop->iteration}}</h6>
                                </td>
                                <td class="border-bottom">
                                    <h6 class="fw-semibold mb-0">{{$Karyawan['no_induk']}}</h6>
                                </td>
                                <td class="border-bottom">
                                    <h6 class="fw-semibold mb-1">{{$Karyawan['nama']}}</h6>
                                    {{-- <span class="fw-normal">Web Designer</span> --}}
                                </td>
                                <td class="border-bottom">
                                    <p class="mb-0 fw-normal">{{$Karyawan['alamat']}}</p>
                                </td>
                                <td class="border-bottom">
                                    <p class="mb-0 fw-normal">{{ \Carbon\Carbon::parse($Karyawan['tgl_lahir'])->format('d-M-y') }}</p>
                                </td>
                                <td class="border-bottom">
                                    <p class="mb-0 fw-normal">{{ \Carbon\Carbon::parse($Karyawan['tgl_bergabung'])->format('d-M-y') }}</p>
                                </td>
                                <td class="border-bottom">
                                    <form action="{{ route('karyawan.destroy', $Karyawan['id']) }}" method="POST"
                                        onsubmit="return confirm('Apakah anda yakin untuk menghapus Data?')">
                                        <a class="btn btn-success" href="{{ route('karyawan.show', $Karyawan['id']) }}">Detail</a>
                                        <a class="btn btn-primary" href="{{ route('karyawan.edit', $Karyawan['id']) }}">Edit</a>    
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection
