@extends('layouts.admin')

@section('title', 'Lokasi')

@section('content')
<style>
    thead { background-color: blue; color: aliceblue; }
</style>

<div class="page-header">
    <h3 class="font-weight-bold">Lokasi</h3><br>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">Tambah Lokasi</button>
</div>

<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Lokasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('lokasi.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>Nama Lokasi</label>
                            <input type="text" class="form-control" name="nama_lokasi" placeholder="Masukan Nama Lokasi" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                        <thead>
                            <tr align="center">
                                <th>No</th>
                                <th>Nama Lokasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="background-color:white;">
                            @foreach($lokasi as $index => $row)
                            <tr>
                                <td style="text-align: center;">{{ $index + 1 }}</td>
                                <td>{{ $row->nama_lokasi }}</td>
                                <td style="text-align: center;">
                                    <a title="hapus" class="btn btn-danger" style="font-size: 20px;" href="{{ route('lokasi.destroy', $row->lokasi_id) }}" onclick="event.preventDefault(); if(confirm('Anda yakin akan menghapus data ini?')) document.getElementById('hapus-form-{{ $row->lokasi_id }}').submit();"><i class="fa-solid fa-trash-can"></i></a>
                                    <form id="hapus-form-{{ $row->lokasi_id }}" action="{{ route('lokasi.destroy', $row->lokasi_id) }}" method="post" style="display: none;">@csrf @method('DELETE')</form>
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

@section('scripts')
<script>
$(document).ready(function() {
    $('#table').DataTable();
});
</script>
@endsection
