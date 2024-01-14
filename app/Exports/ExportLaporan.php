<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\AdminGudang\Barang;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Style\Border;

class ExportLaporan implements FromCollection, WithMapping, WithTitle, WithHeadings, WithEvents
{
    protected $filter;

    public function __construct($filter, $judulLaporan)
    {
        $this->filter = $filter;
        $this->judulLaporan = $judulLaporan;
    }

    public function title(): string
    {
        return 'Laporan Barang'; // Judul sheet pada file Excel
    }

    public function headings(): array
    {
        return [
            'NO',
            'Nama',
            'Kategori',
            'Satuan',
            'Deskripsi',
            'Hari/Tanggal',
            'Time'
        ];
    }

    public function collection(): Collection
    {
        $filterResults = $this->filter->get();

        return $filterResults;
    }

    public function map($export): array
    {
        $tanggalFormatted = match ($this->filter) {
            'hariIni' => Carbon::parse($export->barang->created_at)->translatedFormat('l'),
            'bulanIni' => Carbon::parse($export->barang->created_at)->translatedFormat('F'),
            'tahunIni' => Carbon::parse($export->barang->created_at)->translatedFormat('Y'),
            default => Carbon::parse($export->barang->created_at)->translatedFormat('l, j F Y'),
        };
        $timeFormatted = Carbon::parse($export->barang->created_at)->translatedFormat('H:i'); // Format waktu (jam:menit)

        if ($this->filter === 'hariIni') {
            $tanggalFormatted = Carbon::parse($export->barang->created_at)->translatedFormat('l');
        } elseif ($this->filter === 'bulanIni') {
            $tanggalFormatted = Carbon::parse($export->barang->created_at)->translatedFormat('F');
        }


        static $no = 1;
        return [
            'NO' => $no++,
            'Nama' => $export->barang->nama,
            'Kategori' => $export->barang->kategori->nama,
            'Satuan' => $export->barang->satuan->simbol,
            'Deskripsi' => $export->barang->deskripsi,
            'Hari/Tanggal' => $tanggalFormatted,
            'time' => $export->created_at->format('H:i')
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {



                // Menambahkan judul, logo, dan jarak sebelum data
                $event->sheet->insertNewRowBefore(1, 4); // Jarak 4 baris sebelum judul dan logo
                $event->sheet->getStyle('A1:G1')->applyFromArray([
                    'font' => [
                        'color' => ['rgb' => 'FFFFFF'],
                        'size' => 16,
                    ],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['rgb' => '000000'],
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);
                $event->sheet->getStyle('A5:G5')->applyFromArray([
                    'font' => [
                        'color' => ['rgb' => 'FFFFFF'],
                    ],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['rgb' => '000000'],
                    ],
                    'borders' => [ // Menambahkan border ke seluruh sel pada rentang A5:F5
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'],
                        ],
                    ],
                ]);

                // Mengatur ukuran kolom sesuai dengan panjang teks/datanya
                foreach (range('A', 'F') as $column) {
                    $event->sheet->getColumnDimension($column)->setAutoSize(true);
                }

                // Menambahkan pengaturan layout halaman
                $event->sheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);

                // Menyisipkan judul di tengah lembar Excel
                $event->sheet->mergeCells('A1:F1');
                $event->sheet->setCellValue('A1', $this->judulLaporan);

                // Menambahkan kode untuk menyisipkan logo di sini
                // Misalnya:
                // $event->sheet->insertImage('path/to/logo.png', 'B1');
            },
        ];
    }
}
