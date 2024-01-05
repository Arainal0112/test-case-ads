@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Data Karyawan Yang Pernah Cuti</h5>
                <a href="{{route('cuti.create')}}"
                class="btn btn-primary">Tambah Cuti</a>
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
                                    <h6 class="fw-semibold mb-0">Tanggal Cuti</h6>
                                </th>
                                <th class="border-bottom">
                                    <h6 class="fw-semibold mb-0">Lama</h6>
                                </th>
                                <th class="border-bottom">
                                    <h6 class="fw-semibold mb-0">Keterangan</h6>
                                </th>
                                <th class="border-bottom">
                                    <h6 class="fw-semibold mb-0">Aksi</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cuti as $Cuti)
                                
                            <tr>
                                <td class="border-bottom">
                                    <h6 class="fw-semibold mb-0">{{$loop->iteration}}</h6>
                                </td>
                                <td class="border-bottom">
                                    <h6 class="fw-semibold mb-0">{{$Cuti->karyawan->no_induk}}</h6>
                                </td>
                                <td class="border-bottom">
                                    <h6 class="fw-semibold mb-1">{{$Cuti->karyawan->nama}}</h6>
                                    
                                </td>
                                <td class="border-bottom">
                                    <p class="mb-0 fw-normal">{{ \Carbon\Carbon::parse($Cuti->tgl_cuti)->format('d-M-y') }}</p>
                                </td>
                                <td class="border-bottom">
                                    <p class="mb-0 fw-normal">{{$Cuti->lama_cuti}}</p>
                                </td>
                                <td class="border-bottom">
                                    <p class="mb-0 fw-normal">{{$Cuti->keterangan}}</p>
                                </td>
                                <td class="border-bottom">
                                    <form action="{{ route('cuti.destroy', $Cuti->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah anda yakin untuk menghapus Data?')">
                                        <a class="btn btn-primary" href="{{ route('cuti.edit', $Cuti->id) }}">Edit</a>    
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
