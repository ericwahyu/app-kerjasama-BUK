<?php

namespace App\Exports;

use App\Models\Document;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DocumentExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $document;

    function __construct($document)
    {
        $this->document = $document;
    }

    public function collection()
    {
        //
        // return $this->export_datas;
        return $this->document;
    }

    public function headings() : array
    {
        return [
            'Instansi',
            'Jenis Dokumen',
            'Nomor Dokumen',
            'Judul',
            'Fakultas',
            'Program Studi',
            'Keterangan',
            'Mitra',
            'Kegiatan',
            'Status',
            'Tanggal Awal',
            'Tanggal Berakhir',
        ];
    }
}
