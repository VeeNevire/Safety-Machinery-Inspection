@extends('layouts.admin')

@section('title', 'Data Mesin')

@section('content')
<style>
    #loading { position: fixed; width: 100%; height: 100%; top: 0; left: 0; display: flex; justify-content: center; align-items: center; background-color: rgba(255, 255, 255, 0.9); z-index: 1000; }
    .spinner { display: inline-block; width: 80px; height: 80px; }
    .spinner:after { content: " "; display: block; width: 64px; height: 64px; margin: 8px; border-radius: 50%; border: 6px solid #3498db; border-color: #3498db transparent #3498db transparent; animation: spin 1.2s linear infinite; }
    @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
    #content-page { display: none; }
    thead { background-color: blue; color: aliceblue; }
    .modal-body { max-height: 400px; overflow-y: auto; }
</style>

<script>
document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
        document.getElementById('loading').style.display = 'none';
        document.getElementById('content-page').style.display = 'block';
        document.body.style.overflow = 'auto';
    }, 3000);
});
</script>

<div id="loading"><div class="spinner"></div></div>

<div id="content-page">
<div class="page-header">
    <h3 class="font-weight-bold">Data Mesin</h3><br>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">Tambah Mesin</button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exportModal">Export Data</button>
</div>

<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Data Mesin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('mesin.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>No Mesin</label>
                            <input type="text" class="form-control" name="no_mesin" id="noMesinBaru" value="" readonly>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Nama Mesin</label>
                            <input type="text" class="form-control" name="nama_mesin" required>
                        </div>
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

<div class="modal fade" id="exportModal" tabindex="-1" role="dialog" aria-labelledby="exportModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exportModalLabel">Pilihan Export Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('mesin.export') }}" method="get">
                    <div class="form-group">
                        <label><input type="radio" name="export_option" value="all" checked> Export Semua</label>
                    </div>
                    <div class="form-group">
                        <label><input type="radio" name="export_option" value="date_range"> Export sesuai tanggal</label>
                    </div>
                    <div id="dateRangeForm" style="display: none;">
                        <div class="form-group">
                            <label for="start_date">Dimulai Tanggal:</label>
                            <input type="date" class="form-control" id="start_date" name="start_date">
                        </div>
                        <div class="form-group">
                            <label for="end_date">Akhir Tanggal:</label>
                            <input type="date" class="form-control" id="end_date" name="end_date">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Export</button>
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
                    <table class="table table-bordered" id="table-mesin" width="100%" cellspacing="0">
                        <thead>
                            <tr align="center">
                                <th rowspan="2" style="vertical-align: middle; text-align: center;">NO MESIN</th>
                                <th rowspan="2" style="vertical-align: middle; text-align: center;">NAMA MESIN</th>
                                <th rowspan="2" style="vertical-align: middle; text-align: center;">TERAKHIR AUDIT</th>
                                <th rowspan="2" style="vertical-align: middle; text-align: center;">LOKASI</th>
                                <th rowspan="2" style="vertical-align: middle; text-align: center;">DEPARTMENT</th>
                                <th colspan="2">SAFETY COVER</th>
                                <th colspan="2">EMERGENCY STOP</th>
                                <th colspan="2">SENSOR/LIMIT SWITCH</th>
                                <th rowspan="2" style="vertical-align: middle; text-align: center;">TITIK POTONG</th>
                                <th rowspan="2" style="vertical-align: middle; text-align: center;">TITIK PENTALAN</th>
                                <th rowspan="2" style="vertical-align: middle; text-align: center;">TITIK JEPIT</th>
                                <th rowspan="2" style="vertical-align: middle; text-align: center;">PELINDUNG LAIN</th>
                                <th rowspan="2" style="vertical-align: middle; text-align: center;">OPERATOR TERLINDUNGI?</th>
                                <th rowspan="2" style="vertical-align: middle; text-align: center;">TAG LOTO?</th>
                                <th rowspan="2" style="vertical-align: middle; text-align: center;">KECELAKAAN KERJA?</th>
                                <th colspan="1">PERBAIKAN PELINDUNG</th>
                                <th rowspan="2" style="vertical-align: middle; text-align: center;">KETERANGAN</th>
                                <th rowspan="2" style="vertical-align: middle; text-align: center;">Aksi</th>
                            </tr>
                            <tr style="text-align: center;">
                                <th>Baik</th><th>Tidak Baik</th><th>Baik</th><th>Tidak Baik</th><th>Baik</th><th>Tidak Baik</th>
                                <th>Berapa Kali?</th>
                            </tr>
                        </thead>
                        <tbody style="background-color:white;">
                            @foreach($mesin as $row)
                            @php
                                $isNotGood = $row->safety_cover == 'tidak baik' || $row->emergency_stop == 'tidak baik' || $row->sensor == 'tidak baik';
                            @endphp
                            <tr style="{{ $isNotGood ? 'background-color: red;' : '' }}">
                                <td>{{ $row->no_mesin }}</td>
                                <td>{{ $row->nama_mesin }}</td>
                                <td>{{ $row->tanggal == '0000-00-00' ? 'Belum di cek' : date('d-m-Y', strtotime($row->tanggal)) }}</td>
                                <td>{{ $row->nama_lokasi }}</td>
                                <td>{{ $row->nama_department }}</td>
                                <td style="text-align: center;">{{ $row->safety_cover == 'baik' ? '✔️' : '' }}</td>
                                <td style="text-align: center;">{{ $row->safety_cover == 'tidak baik' ? '✔️' : '' }}</td>
                                <td style="text-align: center;">{{ $row->emergency_stop == 'baik' ? '✔️' : '' }}</td>
                                <td style="text-align: center;">{{ $row->emergency_stop == 'tidak baik' ? '✔️' : '' }}</td>
                                <td style="text-align: center;">{{ $row->sensor == 'baik' ? '✔️' : '' }}</td>
                                <td style="text-align: center;">{{ $row->sensor == 'tidak baik' ? '✔️' : '' }}</td>
                                <td style="text-align: center;">{{ $row->titik_potong == 'ada' ? '✔️' : '' }}</td>
                                <td style="text-align: center;">{{ $row->titik_pentalan == 'ada' ? '✔️' : '' }}</td>
                                <td style="text-align: center;">{{ $row->titik_jepit == 'ada' ? '✔️' : '' }}</td>
                                <td>{{ $row->pelindung_lain_jika_ada }}</td>
                                <td style="text-align: center;">{{ $row->terlindung_dari_potensi_bahaya == 'ya' ? '✔️' : '' }}</td>
                                <td style="text-align: center;">{{ $row->tag_loto_di_mesin == 'ada' ? '✔️' : '' }}</td>
                                <td style="text-align: center;">{{ $row->mesin_pernah_kecelakaan_kerja }}</td>
                                <td style="text-align: center;">{{ $row->perbaikan_pelindung_mesin }}</td>
                                <td>{{ $row->keterangan_tambahan }}</td>
                                <td>
                                    <a title="barcode" class="btn btn-success" style="padding: 10px 20px; font-size: 20px;" href="{{ route('scan.show', $row->no_mesin) }}"><i class="fas fa-qrcode"></i></a>
                                    <button type="button" class="btn btn-warning" style="padding: 10px 20px; font-size: 20px;" data-toggle="modal" data-target="#editModal{{ $row->id }}"><i class="fa-solid fa-pen-to-square"></i></button>
                                    <button type="button" class="btn btn-info" style="padding: 10px 20px; font-size: 20px;" onclick="loadRiwayat('{{ $row->no_mesin }}')" data-toggle="modal" data-target="#riwayatModal"><i class="fa-solid fa-history"></i></button>
                                    <button title="hapus" class="btn btn-danger" style="padding: 10px 20px; font-size: 20px;" data-toggle="modal" data-target="#hapusModal{{ $row->id }}"><i class="fa-solid fa-trash-can"></i></button>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $row->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="editModalLabel{{ $row->id }}">Edit Data</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('mesin.update', $row->id) }}" method="post">
                                                @csrf @method('PUT')
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <label>Kode Mesin</label>
                                                        <input type="text" class="form-control" name="no_mesin" value="{{ $row->no_mesin }}" readonly>
                                                        <input type="hidden" name="id" value="{{ $row->id }}">
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label>Nama Mesin</label>
                                                        <input type="text" class="form-control" name="nama_mesin" value="{{ $row->nama_mesin }}">
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label>Lokasi</label>
                                                        <select class="form-control edit_lokasi_nama" name="nama_lokasi" id="edit_lokasi_nama_{{ $row->id }}" required>
                                                            <option value="">Pilih Lokasi</option>
                                                            @foreach($lokasi as $l)
                                                            <option data-id="{{ $l->lokasi_id }}" value="{{ $l->nama_lokasi }}" {{ $l->nama_lokasi == $row->nama_lokasi ? 'selected' : '' }}>{{ $l->nama_lokasi }}</option>
                                                            @endforeach
                                                        </select>
                                                        <input type="hidden" name="lokasi_id" id="edit_lokasi_id_{{ $row->id }}">
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label>Department</label>
                                                        <select class="form-control" name="nama_department" id="edit_nama_department_{{ $row->id }}" required>
                                                            <option value="">Pilih Department</option>
                                                        </select>
                                                        <input type="hidden" id="edit_department_val_{{ $row->id }}" value="{{ $row->nama_department }}">
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label>Safety Cover</label>
                                                        <div class="form-inline">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="safety_cover" value="baik" {{ $row->safety_cover == 'baik' ? 'checked' : '' }}>
                                                                <label class="custom-label text-black">Baik</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="safety_cover" value="tidak baik" {{ $row->safety_cover == 'tidak baik' ? 'checked' : '' }}>
                                                                <label class="custom-label text-black">Tidak Baik</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label>Emergency Stop</label>
                                                        <div class="form-inline">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="emergency_stop" value="baik" {{ $row->emergency_stop == 'baik' ? 'checked' : '' }}>
                                                                <label class="custom-label text-black">Baik</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="emergency_stop" value="tidak baik" {{ $row->emergency_stop == 'tidak baik' ? 'checked' : '' }}>
                                                                <label class="custom-label text-black">Tidak Baik</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label>Sensor/Limit Switch</label>
                                                        <div class="form-inline">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="sensor" value="baik" {{ $row->sensor == 'baik' ? 'checked' : '' }}>
                                                                <label class="custom-label text-black">Baik</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="sensor" value="tidak baik" {{ $row->sensor == 'tidak baik' ? 'checked' : '' }}>
                                                                <label class="custom-label text-black">Tidak Baik</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label>Titik Potong</label>
                                                        <div class="form-inline">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="titik_potong" value="ada" {{ $row->titik_potong == 'ada' ? 'checked' : '' }}>
                                                                <label class="custom-label text-black">Ada</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="titik_potong" value="tidak ada" {{ $row->titik_potong == 'tidak ada' ? 'checked' : '' }}>
                                                                <label class="custom-label text-black">Tidak Ada</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label>Titik Pentalan</label>
                                                        <div class="form-inline">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="titik_pentalan" value="ada" {{ $row->titik_pentalan == 'ada' ? 'checked' : '' }}>
                                                                <label class="custom-label text-black">Ada</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="titik_pentalan" value="tidak ada" {{ $row->titik_pentalan == 'tidak ada' ? 'checked' : '' }}>
                                                                <label class="custom-label text-black">Tidak Ada</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label>Titik Jepit</label>
                                                        <div class="form-inline">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="titik_jepit" value="ada" {{ $row->titik_jepit == 'ada' ? 'checked' : '' }}>
                                                                <label class="custom-label text-black">Ada</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="titik_jepit" value="tidak ada" {{ $row->titik_jepit == 'tidak ada' ? 'checked' : '' }}>
                                                                <label class="custom-label text-black">Tidak Ada</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label>Pelindung Lain Jika Ada</label>
                                                        <input type="text" class="form-control" name="pelindung_lain_jika_ada" value="{{ $row->pelindung_lain_jika_ada }}">
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label>Apakah Operator Terlindungi Dari Potensi Bahaya?</label>
                                                        <div class="form-inline">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="terlindung_dari_potensi_bahaya" value="ya" {{ $row->terlindung_dari_potensi_bahaya == 'ya' ? 'checked' : '' }}>
                                                                <label class="custom-label text-black">Ya</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="terlindung_dari_potensi_bahaya" value="tidak" {{ $row->terlindung_dari_potensi_bahaya == 'tidak' ? 'checked' : '' }}>
                                                                <label class="custom-label text-black">Tidak</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label>Apakah Tag Loto Tersedia Di Mesin?</label>
                                                        <div class="form-inline">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="tag_loto_di_mesin" value="ada" {{ $row->tag_loto_di_mesin == 'ada' ? 'checked' : '' }}>
                                                                <label class="custom-label text-black">Ada</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="tag_loto_di_mesin" value="tidak ada" {{ $row->tag_loto_di_mesin == 'tidak ada' ? 'checked' : '' }}>
                                                                <label class="custom-label text-black">Tidak Ada</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label>Pernah Ada Kecelakaan Kerja?</label>
                                                        <div class="form-inline">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="mesin_pernah_kecelakaan_kerja" value="ya" {{ $row->mesin_pernah_kecelakaan_kerja == 'ya' ? 'checked' : '' }}>
                                                                <label class="custom-label text-black">Ya</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="mesin_pernah_kecelakaan_kerja" value="tidak" {{ $row->mesin_pernah_kecelakaan_kerja == 'tidak' ? 'checked' : '' }}>
                                                                <label class="custom-label text-black">Tidak</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label>Perbaikan Pelindung Mesin</label>
                                                        <input type="text" class="form-control" name="perbaikan_pelindung_mesin" value="{{ $row->perbaikan_pelindung_mesin }}">
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label>Keterangan Tambahan</label>
                                                        <input type="text" class="form-control" name="keterangan_tambahan" value="{{ $row->keterangan_tambahan }}">
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

                            <!-- Hapus Modal -->
                            <div class="modal fade" id="hapusModal{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel{{ $row->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="hapusModalLabel{{ $row->id }}">Konfirmasi Penghapusan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form action="{{ route('mesin.destroy', $row->id) }}" method="post">
                                            @csrf @method('DELETE')
                                            <input type="hidden" name="no_mesin" value="{{ $row->no_mesin }}">
                                            <div class="modal-body">
                                                <p>Anda yakin akan menghapus data ini?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Riwayat Modal -->
<div class="modal fade" id="riwayatModal" tabindex="-1" role="dialog" aria-labelledby="riwayatModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="riwayatModalLabel">Riwayat Pengecekan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body" id="riwayatContent">Memuat...</div>
        </div>
    </div>
</div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('#table-mesin').DataTable();
    
    $('input[type=radio][name=export_option]').change(function() {
        if (this.value === 'date_range') {
            $('#dateRangeForm').slideDown();
        } else {
            $('#dateRangeForm').slideUp();
        }
    });

    $('#lokasi_nama').change(function() {
        var lokasi_id = $(this).find(':selected').data('id');
        $('#lokasi_id').val(lokasi_id);
        $.ajax({
            type: 'POST',
            url: '{{ route("department.by-lokasi") }}',
            data: { lokasi_id: lokasi_id, _token: '{{ csrf_token() }}' },
            success: function(response) {
                $('#nama_department').html(response);
            }
        });
    });

    $('.edit_lokasi_nama').change(function() {
        var rowId = $(this).data('row-id');
        if (!rowId) {
            rowId = this.id.replace('edit_lokasi_nama_', '');
        }
        var lokasi_id = $(this).find(':selected').data('id');
        $('#edit_lokasi_id_' + rowId).val(lokasi_id);
        $.ajax({
            type: 'POST',
            url: '{{ route("department.by-lokasi") }}',
            data: { lokasi_id: lokasi_id, _token: '{{ csrf_token() }}' },
            success: function(response) {
                $('#edit_nama_department_' + rowId).html(response);
                var selectedDept = $('#edit_department_val_' + rowId).val();
                $('#edit_nama_department_' + rowId + ' option').each(function() {
                    if ($(this).val() == selectedDept) {
                        $(this).prop('selected', true);
                    }
                });
            }
        });
    });
});

function loadRiwayat(noMesin) {
    $('#riwayatContent').html('Memuat...');
    $.ajax({
        url: '{{ route("riwayat.fetch") }}',
        type: 'POST',
        data: { no_mesin: noMesin, _token: '{{ csrf_token() }}' },
        success: function(response) {
            $('#riwayatContent').html(response);
        },
        error: function() {
            $('#riwayatContent').html('Gagal memuat riwayat.');
        }
    });
}
</script>
@endsection
