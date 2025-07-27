<?php
namespace App\Exports;

use App\Models\Peminjaman;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PeminjamanExport implements FromCollection, WithHeadings, WithStyles
{
    protected $startDate;
    protected $endDate;
    protected $status;

    public function __construct($startDate, $endDate, $status)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->status = $status;
    }

    public function collection(): Collection
    {
        return Peminjaman::query()
            ->when($this->startDate && $this->endDate, fn($q) =>
                $q->whereBetween('tanggal', [$this->startDate, $this->endDate])
            )
            ->when($this->status, fn($q) =>
                $q->where('status', $this->status)
            )
            ->with(['user', 'buku'])
            ->get()
            ->map(function ($item) {
                return [
                    'Nama Peminjam' => $item->user->name,
                    'Judul Buku' => $item->buku->nama_buku,
                    'Tanggal Peminjaman' => $item->tanggal,
                    'Status' => $item->status,
                ];
            });
    }

    public function headings(): array
    {
        return ['Nama Peminjam', 'Judul Buku', 'Tanggal Peminjaman', 'Status'];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true], 'borders' => [
                'allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
            ]],
        ];
    }
}
