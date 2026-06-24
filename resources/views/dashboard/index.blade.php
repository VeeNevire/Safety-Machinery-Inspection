@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Selamat Datang, {{ Auth::user()->name ?? Auth::user()->username }}</h3>
                <h6 class="font-weight-normal mb-0">
                    <span class="text-primary">Gunakan Alat Pelindung Diri (APD)</span>
                </h6>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3 mb-4 stretch-card transparent">
        <div class="card card-tale">
            <div class="card-body">
                <h3 class="mb-4">Mesin Factory A</h3>
                <p class="fs-30 mb-2">{{ number_format($mesin_fa ?? 0) }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4 stretch-card transparent">
        <div class="card card-dark-blue">
            <div class="card-body">
                <h3 class="mb-4">Mesin Factory B</h3>
                <p class="fs-30 mb-2">{{ number_format($mesin_fb ?? 0) }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4 stretch-card transparent">
        <div class="card card-light-blue">
            <div class="card-body">
                <h3 class="mb-4">Mesin Factory C</h3>
                <p class="fs-30 mb-2">{{ number_format($mesin_fc ?? 0) }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4 stretch-card transparent">
        <div class="card card-light-danger">
            <div class="card-body">
                <h3 class="mb-4">Maintenance</h3>
                <p class="fs-30 mb-2">{{ number_format($mesin_mtc ?? 0) }}</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3 mb-4 stretch-card transparent">
        <div class="card card-light-blue">
            <div class="card-body">
                <h3 class="mb-4">OMOB</h3>
                <p class="fs-30 mb-2">{{ number_format($omob_count ?? 0) }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4 stretch-card transparent">
        <div class="card card-dark-blue">
            <div class="card-body">
                <h3 class="mb-4">Data Pengguna</h3>
                <p class="fs-30 mb-2">{{ number_format($pengguna_count ?? 0) }}</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
        icon: 'info',
        title: 'Informasi',
        text: 'Hanya versi demo, untuk melihat versi full silahkan hubungi saya.',
        confirmButtonText: 'OK'
    });
});
</script>
@endsection
