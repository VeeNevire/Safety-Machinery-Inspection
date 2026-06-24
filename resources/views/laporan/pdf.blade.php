<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Inspeksi Mesin</title>
    <style>
        table { width: 100%; border-collapse: collapse; font-size: 10px; }
        th, td { border: 1px solid #000; padding: 4px; text-align: center; }
        th { background-color: #007bff; color: white; }
        h2 { text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>
    <h2>LAPORAN INSPEKSI MESIN</h2>
    <p>Tanggal Cetak: {{ now()->format('d-m-Y') }}</p>
    <table>
        <thead>
            <tr>
                <th>NO MESIN</th>
                <th>NAMA MESIN</th>
                <th>TANGGAL</th>
                <th>LOKASI</th>
                <th>DEPARTMENT</th>
                <th>SAFETY COVER</th>
                <th>EMERGENCY STOP</th>
                <th>SENSOR</th>
                <th>TITIK POTONG</th>
                <th>TITIK PENTALAN</th>
                <th>TITIK JEPIT</th>
                <th>TERLINDUNG?</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mesins as $mesin)
            <tr>
                <td>{{ $mesin->no_mesin }}</td>
                <td>{{ $mesin->nama_mesin }}</td>
                <td>{{ $mesin->tanggal && $mesin->tanggal != '0000-00-00' ? date('d-m-Y', strtotime($mesin->tanggal)) : 'Belum di cek' }}</td>
                <td>{{ $mesin->nama_lokasi }}</td>
                <td>{{ $mesin->nama_department }}</td>
                <td>{{ $mesin->safety_cover }}</td>
                <td>{{ $mesin->emergency_stop }}</td>
                <td>{{ $mesin->sensor }}</td>
                <td>{{ $mesin->titik_potong }}</td>
                <td>{{ $mesin->titik_pentalan }}</td>
                <td>{{ $mesin->titik_jepit }}</td>
                <td>{{ $mesin->terlindung_dari_potensi_bahaya }}</td>
                <td>{{ $mesin->keterangan_tambahan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
