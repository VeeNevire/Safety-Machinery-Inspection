@extends('layouts.admin')

@section('title', 'Scan')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Scan Mesin</h4>

                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('scan.index') }}" method="get" id="scanForm" class="mb-4">
                            @csrf
                            <div class="form-group">
                                <label for="no_mesin">Masukkan No Mesin:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="no_mesin" id="no_mesin_input" placeholder="Contoh: MSN001" required>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <script>
                document.getElementById('scanForm').addEventListener('submit', function(e) {
                    e.preventDefault();
                    var noMesin = document.getElementById('no_mesin_input').value.trim();
                    if (noMesin) {
                        window.location.href = '{{ url("scan") }}/' + noMesin;
                    }
                });
                </script>

                @if(isset($mesin))
                <div class="card mt-3">
                    <div class="card-header bg-primary text-white">
                        <h4>Detail Mesin: {{ $mesin->no_mesin }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <tr><th>No Mesin</th><td>{{ $mesin->no_mesin }}</td></tr>
                                    <tr><th>Nama Mesin</th><td>{{ $mesin->nama_mesin }}</td></tr>
                                    <tr><th>Lokasi</th><td>{{ $mesin->nama_lokasi }}</td></tr>
                                    <tr><th>Department</th><td>{{ $mesin->nama_department }}</td></tr>
                                    <tr><th>Terakhir Audit</th><td>{{ $mesin->tanggal == '0000-00-00' ? 'Belum di cek' : date('d-m-Y', strtotime($mesin->tanggal)) }}</td></tr>
                                    <tr><th>Safety Cover</th><td>{{ $mesin->safety_cover ?: '-' }}</td></tr>
                                    <tr><th>Emergency Stop</th><td>{{ $mesin->emergency_stop ?: '-' }}</td></tr>
                                    <tr><th>Sensor</th><td>{{ $mesin->sensor ?: '-' }}</td></tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <div class="text-center">
                                    {!! DNS1D::getBarcodeHTML($mesin->no_mesin, 'C128', 2, 60) !!}
                                    <p class="mt-2"><strong>{{ $mesin->no_mesin }}</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="alert alert-info">
                    Silakan masukkan No Mesin untuk melihat detail.
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection
