<?php

namespace App\Http\Controllers;

use App\Models\Mesin;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = Mesin::with('opl')->orderBy('id')->get();
        return view('laporan.index', compact('laporan'));
    }

    public function exportExcel(Request $request)
    {
        $query = Mesin::with('opl')->orderBy('id');

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('tanggal', [$request->start_date, $request->end_date]);
        }

        $mesins = $query->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Data Mesin');

        $headers = ['NO MESIN', 'NAMA MESIN', 'TANGGAL', 'LOKASI', 'DEPARTMENT',
            'SAFETY COVER', 'EMERGENCY STOP', 'SENSOR',
            'TITIK POTONG', 'TITIK PENTALAN', 'TITIK JEPIT',
            'PELINDUNG LAIN', 'TERLINDUNG?', 'TAG LOTO',
            'KECELAKAAN KERJA', 'PERBAIKAN PELINDUNG', 'KETERANGAN'];

        $col = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($col . '1', $header);
            $sheet->getStyle($col . '1')->getFont()->setBold(true);
            $sheet->getStyle($col . '1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle($col . '1')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
            $col++;
        }

        $rowNum = 2;
        foreach ($mesins as $mesin) {
            $col = 'A';
            $sheet->setCellValue($col++ . $rowNum, $mesin->no_mesin);
            $sheet->setCellValue($col++ . $rowNum, $mesin->nama_mesin);
            $sheet->setCellValue($col++ . $rowNum, $mesin->tanggal && $mesin->tanggal != '0000-00-00' ? $mesin->tanggal : 'Belum di cek');
            $sheet->setCellValue($col++ . $rowNum, $mesin->nama_lokasi);
            $sheet->setCellValue($col++ . $rowNum, $mesin->nama_department);
            $sheet->setCellValue($col++ . $rowNum, $mesin->safety_cover);
            $sheet->setCellValue($col++ . $rowNum, $mesin->emergency_stop);
            $sheet->setCellValue($col++ . $rowNum, $mesin->sensor);
            $sheet->setCellValue($col++ . $rowNum, $mesin->titik_potong);
            $sheet->setCellValue($col++ . $rowNum, $mesin->titik_pentalan);
            $sheet->setCellValue($col++ . $rowNum, $mesin->titik_jepit);
            $sheet->setCellValue($col++ . $rowNum, $mesin->pelindung_lain_jika_ada);
            $sheet->setCellValue($col++ . $rowNum, $mesin->terlindung_dari_potensi_bahaya);
            $sheet->setCellValue($col++ . $rowNum, $mesin->tag_loto_di_mesin);
            $sheet->setCellValue($col++ . $rowNum, $mesin->mesin_pernah_kecelakaan_kerja);
            $sheet->setCellValue($col++ . $rowNum, $mesin->perbaikan_pelindung_mesin);
            $sheet->setCellValue($col++ . $rowNum, $mesin->keterangan_tambahan);
            $rowNum++;
        }

        foreach (range('A', $col) as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'Data Laporan Inspeksi ' . now()->format('Y-m-d') . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit;
    }

    public function exportPdf(Request $request)
    {
        $query = Mesin::with('opl')->orderBy('id');

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('tanggal', [$request->start_date, $request->end_date]);
        }

        $mesins = $query->get();

        $pdf = Pdf::loadView('laporan.pdf', compact('mesins'));
        return $pdf->download('Data Laporan Inspeksi ' . now()->format('Y-m-d') . '.pdf');
    }
}
