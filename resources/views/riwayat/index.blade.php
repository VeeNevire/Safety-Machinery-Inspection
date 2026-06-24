@extends('layouts.admin')

@section('title', 'Riwayat')

@section('content')
<style>
    .folder-card { cursor: pointer; transition: transform 0.2s; }
    .folder-card:hover { transform: scale(1.05); }
</style>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4"></div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Riwayat</h6>
        </div>
        <div class="card-body">
            <div class="row">
                @php
                $colors = ['#d3e7ee', '#eadcf3', '#eef1f3', '#eadcf3', '#d3e7ee', '#eef1f3'];
                $tanggal_data = $riwayats->pluck('tanggal')->unique()->filter();
                @endphp
                @forelse($tanggal_data as $tanggal)
                @php $random_color = $colors[array_rand($colors)]; @endphp
                <div class="col-xl-3 col-md-6 mb-4">
                    <div style="background-color: {{ $random_color }};" class="card border-left-primary shadow h-100 py-2 folder-card">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xl font-weight-bold text-primary text-uppercase mb-1">Riwayat</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ date('d-m-Y', strtotime($tanggal)) }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-folder fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12"><p class="text-center">Belum ada riwayat.</p></div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
