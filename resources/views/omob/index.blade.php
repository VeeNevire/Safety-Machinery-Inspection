@extends('layouts.admin')

@section('title', 'Data OMOB')

@section('content')
<style>
    thead { background-color: blue; color: aliceblue; }
</style>

<div class="page-header">
    <h3 class="font-weight-bold">Data OMOB</h3><br>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">Tambah data OMOB</button>
</div>

<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Data OMOB</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('omob.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>Lokasi</label>
                            <select class="form-control" name="nama_lokasi" id="lokasi_nama" required>
                                <option value="">Pilih Lokasi</option>
                                @foreach($lokasi as $l)
                                <option data-id="{{ $l->lokasi_id }}" value="{{ $l->nama_lokasi }}">{{ $l->nama_lokasi }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="lokasi_id" id="lokasi_id">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Department</label>
                            <select class="form-control" name="nama_department" id="nama_department" required>
                                <option value="">Pilih Department</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Nama Mesin</label>
                            <select class="form-control" name="no_mesin" id="no_mesin" required>
                                <option value="">Pilih Mesin</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">OMOB</label>
                            <div class="custom-file">
                                <input style="cursor: pointer;" type="file" name="omob" class="custom-file-input" accept="application/pdf" required id="omobFile">
                                <label class="custom-file-label" for="omobFile">Pilih File...</label>
                            </div>
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
                                <th>Lokasi</th>
                                <th>Departemen</th>
                                <th>Nama Mesin</th>
                                <th>OMOB</th>
                                <th>Tipe</th>
                                <th>Ukuran</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody style="background-color:white;">
                            @foreach($omob as $index => $row)
                            <tr>
                                <td style="text-align: center;">{{ $index + 1 }}</td>
                                <td>{{ $row->lokasi }}</td>
                                <td>{{ $row->department }}</td>
                                <td>{{ $row->mesin }}</td>
                                <td>{{ $row->omob }}</td>
                                <td>{{ strtoupper($row->ekstensi) }}</td>
                                <td>{{ number_format($row->size / (1024 * 1024), 2) }}MB</td>
                                <td>-</td>
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

    $('#lokasi_nama').change(function() {
        var lokasi_id = $(this).find(':selected').data('id');
        $('#lokasi_id').val(lokasi_id);
        $.ajax({
            type: 'POST',
            url: '{{ route("department.by-lokasi") }}',
            data: { lokasi_id: lokasi_id, _token: '{{ csrf_token() }}' },
            success: function(response) { $('#nama_department').html(response); }
        });
    });

    $('#lokasi_nama, #nama_department').change(function() {
        var nama_lokasi = $('#lokasi_nama').val();
        var nama_department = $('#nama_department').val();
        if (nama_lokasi && nama_department) {
            $.ajax({
                url: '{{ route("mesin.byLokasiDepartment") }}',
                type: 'POST',
                data: { nama_lokasi: nama_lokasi, nama_department: nama_department, _token: '{{ csrf_token() }}' },
                success: function(data) { $('#no_mesin').html(data); }
            });
        }
    });
});
</script>
@endsection
