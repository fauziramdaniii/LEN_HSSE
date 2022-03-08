<?php

namespace App\Http\Controllers;

use App\Models\DataApar;
use Illuminate\Http\Request;
use App\Models\MasterInspeksi;
use App\Models\DetailInpeksiApar;
use PhpOffice\PhpSpreadsheet\IOFactory;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

class MasterInspeksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periode = MasterInspeksi::orderBy('periode')->get();
        return view('supervisor.dataapar.periode', compact('periode'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supervisor.dataapar.tambahPeriode');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (DataApar::count() < 1) {
            return back()->with('error', 'Isi terlebih dahulu Data Apar');
        }
        $check = MasterInspeksi::where('periode',  date('Y-m-d', strtotime($request->periode)))->where('deleted_at', null)->first();
        if (!empty($check)) {
            toast('Periode ' . date('F Y', strtotime($request->periode)) . ' sudah tersedia', 'error');
            return back();
        }
        $periode = date('Y-m-d', strtotime($request->periode));
        $request->validate([
            'periode' => 'required',
        ]);
        $createPeriode = MasterInspeksi::create([
            'periode' => $periode,
            'status' => 'Belum di Inspeksi',
        ]);

        if ($createPeriode) {
            foreach (DataApar::all() as $apart) {
                DetailInpeksiApar::create([
                    'periode_id' => $createPeriode->id,
                    'apart_id' => $apart->id
                ]);
            }
        }
        toast('Periode Inspeksi berhasil ditambah', 'success');
        return redirect('/apar/masterinspeksi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterInspeksi  $masterInspeksi
     * @return \Illuminate\Http\Response
     */
    public function show(MasterInspeksi $masterInspeksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MasterInspeksi  $masterInspeksi
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterInspeksi $masterInspeksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MasterInspeksi  $masterInspeksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MasterInspeksi $masterInspeksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterInspeksi  $masterInspeksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterInspeksi $masterinspeksi)
    {
        $masterinspeksi->delete();

        toast('Periode berhasil dihapus', 'success');
        return back();
    }

    public function export(MasterInspeksi $id)
    {
        $id = $id->load('DetailInspeksi', 'DetailInspeksi.Apart');
        $tanggal_awal = DetailInpeksiApar::where('periode_id', $id->id)->whereNotNull('tanggal')->orderBy('tanggal', 'asc')->first();
        $tanggal_akhir = DetailInpeksiApar::where('periode_id', $id->id)->whereNotNull('tanggal')->orderBy('tanggal', 'desc')->first();
        $bulan = date('F-Y', strtotime($id->periode));
        $spreadsheet = IOFactory::load('excelTemplate/LAPORAN HASIL INSPEKSI.xlsx');
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $row = 6;
        $no = 1;
        if (!empty($tanggal_awal) && !empty($tanggal_akhir)) {
            if ($tanggal_awal == $tanggal_akhir) {
                $spreadsheet->setActiveSheetIndex(0)->setCellValue("D3", date('d F', strtotime($tanggal_awal->tanggal)));
            } else {
                $spreadsheet->setActiveSheetIndex(0)->setCellValue("D3", date('d', strtotime($tanggal_awal->tanggal)) . " s/d " . date('d F', strtotime($tanggal_akhir->tanggal)));
            }
        }
        foreach ($id->DetailInspeksi as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue("A{$row}", "{$no}")
                ->setCellValue("B{$row}", "{$data->Apart->id}")
                ->setCellValue("C{$row}", "{$data->Apart->tipe}")
                ->setCellValue("D{$row}", "{$data->Apart->jenis}")
                ->setCellValue("E{$row}", "{$data->Apart->berat}")
                ->setCellValue("F{$row}", "{$data->Apart->lokasi}")
                ->setCellValue("G{$row}", "{$data->Apart->provinsi}")
                ->setCellValue("H{$row}", "{$data->Apart->kota}")
                ->setCellValue("I{$row}", "{$data->Apart->zona}")
                ->setCellValue("J{$row}", "{$data->Apart->gedung}")
                ->setCellValue("K{$row}", "{$data->Apart->lantai}")
                ->setCellValue("L{$row}", "{$data->Apart->titik}")
                ->setCellValue("M{$row}", "{$data->Apart->kedaluarsa}")
                ->setCellValue("N{$row}", "{$data->jenis}")
                ->setCellValue("O{$row}", "{$data->noozle}")
                ->setCellValue("P{$row}", "{$data->selang}")
                ->setCellValue("Q{$row}", "{$data->tabung}")
                ->setCellValue("R{$row}", "{$data->rambu}")
                ->setCellValue("S{$row}", "{$data->label}")
                ->setCellValue("T{$row}", "{$data->cat}")
                ->setCellValue("U{$row}", "{$data->pin}")
                ->setCellValue("V{$row}", "{$data->roda}")
                ->setCellValue("W{$row}", "{$data->keterangan}");
            $row++;
            $no++;
        }
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        ob_end_clean(); //
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=HasilInspeksi_" . $bulan . "_" . date('Ymdhis') . ".xlsx");
        $writer->save('php://output');
    }

    public function export_pdf(MasterInspeksi $id)
    {
        $periode = $id->load('DetailInspeksi', 'DetailInspeksi.Apart');
        $bulan = date('F-Y', strtotime($id->periode));
        $pdf = PDF::loadview('layouts.export_pdf_inspeksiAPAR', ['periode' => $periode]);
        $pdf->setPaper('A4', 'landscape');
        $file = "HasilInspeksi_" . $bulan . "_" . date('Ymdhis') . ".xlsx";
        return $pdf->download($file);
    }
}
