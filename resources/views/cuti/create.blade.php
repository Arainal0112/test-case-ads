@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Tambah Cuti Karyawan</h5>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('cuti.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="no_induk" class="form-label">Nama Karyawan</label>
                            <select id="karyawan" class="form-control" name="karyawan">
                              <option value="" selected disabled hidden>-- Pilih karyawan--</option>
                              @foreach ($karyawan as $Karyawan)
                                  <option value={{ $Karyawan->id }}>{{ $Karyawan->nama }}</option>
                              @endforeach
                          </select>
                        </div>
                        <div class="mb-3">
                            <label for="tgl_cuti" class="form-label">Tanggal Cuti</label>
                            <input type="date" class="form-control" name="tgl_cuti" id="tgl_cuti">
                        </div>
                        <div class="mb-3">
                          <label for="lama_cuti" class="form-label">Lama</label>
                          <input type="number" class="form-control" name="lama_cuti" id="lama_cuti">
                      </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" id="keterangan">
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
