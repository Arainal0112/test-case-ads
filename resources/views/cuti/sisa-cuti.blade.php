@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Data Sisa Cuti Karyawan</h5>
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom">
                                    <h6 class="fw-semibold mb-0">No induk</h6>
                                </th>
                                <th class="border-bottom">
                                    <h6 class="fw-semibold mb-0">Nama</h6>
                                </th>
                                <th class="border-bottom">
                                    <h6 class="fw-semibold mb-0">Sisa Cuti Tahun {{ now()->year }}</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $Cuti)
                                
                            <tr>
                                <td class="border-bottom">
                                    <h6 class="fw-semibold mb-0">{{$Cuti['karyawan']['no_induk']}}</h6>
                                </td>
                                <td class="border-bottom">
                                    <h6 class="fw-semibold mb-1">{{$Cuti['karyawan']['nama']}}</h6>
                                    
                                </td>
                                <td class="border-bottom">
                                    <p class="mb-0 fw-normal">{{$Cuti['sisa_cuti']}}</p>
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
