<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Kota;
use App\Models\DataApar;
use App\Models\Provinsi;
use App\Models\TipeApar;
use App\Models\JenisApar;
use App\Models\ZonaLokasi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\MasterInspeksi;
use App\Models\DetailInpeksiApar;
use PhpOffice\PhpSpreadsheet\IOFactory;

class DataAparController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataapar = DataApar::with('Tipe', 'Jenis', 'Zona')->get();
        return view('supervisor.dataapar.index', compact('dataapar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi = Provinsi::orderBy('name')->get();
        $tipe = TipeApar::all();
        $jenis = JenisApar::all();
        $zona = ZonaLokasi::all();
        return view('supervisor.dataapar.create', compact('tipe', 'jenis', 'provinsi', 'zona'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kd_apar' => 'required',
            'tipe_id' => 'required',
            'jenis_id' => 'required',
            'berat' => 'required',
            'zona_id' => 'required',
            'lokasi' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'gedung' => 'required',
            'lantai' => 'required',
            'titik' => 'required',
            'kedaluarsa' => 'required',
            'keterangan' => 'required',
        ]);
        $checkKode = DataApar::where('kd_apar', $request->kd_apar)->count();
        if ($checkKode > 0) {
            toast('Kode APAR sudah dipakai', 'error');
            return back();
        }
        $nama_provinsi = Provinsi::where('id', $request->provinsi)->first();
        $request['provinsi'] =  Str::title(Str::lower($nama_provinsi->name));
        $apar =  DataApar::create($request->all());
        $periodeNow = MasterInspeksi::whereDate('periode', '>=', date('Y-m-01'))->get();
        if (!empty($periodeNow)) {
            foreach ($periodeNow as $periode) {
                DetailInpeksiApar::create([
                    'periode_id' => $periode->id,
                    'apart_id' => $apar->id,
                ]);
            }
        }
        toast('Data APAR berhasil ditambah', 'success');
        return redirect('/apar/dataapar')->with('success', 'dataapar saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataApar  $dataApar
     * @return \Illuminate\Http\Response
     */
    public function show(DataApar $dataApar)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataApar  $dataApar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provinsi = Provinsi::orderBy('name')->get();
        $tipe = TipeApar::all();
        $jenis = JenisApar::all();
        $zona = ZonaLokasi::all();
        $dataapar = DataApar::with('Tipe', 'Jenis', 'Zona')->find($id);
        $id_provinsi = Provinsi::where('name', $dataapar->provinsi)->first();
        $kota = Kota::where('province_id', $id_provinsi->id)->get();
        return view('supervisor.dataapar.edit', ['dataapar' => $dataapar, 'jenis' => $jenis, 'tipe' => $tipe, 'provinsi' => $provinsi, 'kota' => $kota, 'zona' => $zona]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataApar  $dataApar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataApar $dataapar)
    {
        $request->validate([
            'tipe_id' => 'required',
            'jenis_id' => 'required',
            'berat' => 'required',
            'zona_id' => 'required',
            'lokasi' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'gedung' => 'required',
            'lantai' => 'required',
            'titik' => 'required',
            'kedaluarsa' => 'required',
            'keterangan' => 'required',
        ]);
        $nama_provinsi = Provinsi::where('id', $request->provinsi)->first();
        $request['provinsi'] =  Str::title(Str::lower($nama_provinsi->name));
        $dataapar->update($request->all());
        toast('Data APAR berhasil diubah', 'success');
        return redirect('/apar/dataapar')->with('success', 'Data Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataApar  $dataApar
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataApar $dataapar)
    {
        $dataapar->update([
            'kd_apar' => $dataapar->kd_apar . date('ymdhis')
        ]);
        $dataapar->delete();
        toast('Data APAR berhasil dihapus', 'success');
        return redirect('/apar/dataapar')->with('success', 'Data Apar Deleted');
    }

    public function export()
    {
        $spreadsheet = IOFactory::load('excelTemplate/LAPORAN DATA APAR.xlsx');
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $row = 6;
        $no = 1;
        foreach (DataApar::with('Zona', 'Jenis', 'Tipe')->get() as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue("A{$row}", "{$no}")
                ->setCellValue("B{$row}", "{$data->kd_apar}")
                ->setCellValue("C{$row}", "{$data->tipe}")
                ->setCellValue("D{$row}", "{$data->jenis}")
                ->setCellValue("E{$row}", "{$data->berat} KG")
                ->setCellValue("F{$row}", "{$data->lokasi}")
                ->setCellValue("G{$row}", "{$data->provinsi}")
                ->setCellValue("H{$row}", "{$data->kota}")
                ->setCellValue("I{$row}", "{$data->zona}")
                ->setCellValue("J{$row}", "{$data->gedung}")
                ->setCellValue("K{$row}", "{$data->lantai}")
                ->setCellValue("L{$row}", "{$data->titik}")
                ->setCellValue("M{$row}", "{$data->kedaluarsa}")
                ->setCellValue("N{$row}", "{$data->keterangan}");
            $row++;
            $no++;
        }
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        ob_end_clean(); //
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=DataAPAR_" . date('Ymdhis') . ".xlsx");
        $writer->save('php://output');
    }

    public function export_pdf()
    {
        $apars = DataApar::with('Zona', 'Jenis', 'Tipe')->get();

        $pdf = PDF::loadview('layouts.export_pdf_APAR', ['apars' => $apars]);
        $pdf->setPaper('A4', 'landscape');
        $file = "DataAPAR_" . date('Ymdhis') . ".pdf";
        return $pdf->download($file);
    }
}
