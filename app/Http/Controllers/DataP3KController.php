<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Kota;
use App\Models\IsiP3k;
use App\Models\DataP3k;
use App\Models\Provinsi;
use App\Models\ZonaLokasi;
use App\Models\InspeksiP3k;
use App\Models\IsiInspeksi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\MasterInspeksiP3k;
use App\Http\Controllers\Controller;
use PhpOffice\PhpSpreadsheet\IOFactory;

class DataP3kController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datap3k = DataP3k::with('Zona')->get();
        return view('supervisor.datap3k.index', compact('datap3k'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi = Provinsi::orderBy('name')->get();
        $zona = ZonaLokasi::all();
        return view('supervisor.datap3k.create', compact('provinsi', 'zona'));
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
            'kd_p3k' => 'required',
            'tipe' => 'required',
            'lokasi' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'zona_id' => 'required',
            'gedung' => 'required',
            'lantai' => 'required',
            'titik' => 'required',
            'keterangan' => 'required',
        ]);
        $checkKode = DataP3k::where('kd_p3k', $request->kd_p3k)->count();
        if ($checkKode > 0) {
            toast('Kode P3K sudah dipakai', 'error');
            return back();
        }
        $nama_provinsi = Provinsi::where('id', $request->provinsi)->first();
        $request['provinsi'] =  Str::title(Str::lower($nama_provinsi->name));
        $p3k = DataP3k::create($request->all());
        $periodeNow = MasterInspeksiP3k::whereDate('periode', '>=', date('Y-m-01'))->get();
        if (!empty($periodeNow)) {
            foreach ($periodeNow as $periode) {
                $createInspeksi = InspeksiP3k::create([
                    'periode_id' => $periode->id,
                    'p3k_id' => $p3k->id,
                    'status' => 'Belum Inspeksi',
                ]);
                if ($createInspeksi) {
                    switch ($p3k->tipe) {
                        case 'A':
                            $isi = IsiP3k::where('tipe', 'A')->get();
                            break;
                        case 'B':
                            $isi = IsiP3k::where('tipe', 'B')->get();
                            break;
                        case 'C':
                            $isi = IsiP3k::where('tipe', 'C')->get();
                            break;
                        default:
                            break;
                    }

                    foreach ($isi as $isi) {
                        IsiInspeksi::create([
                            'inspeksi_id' => $createInspeksi->id,
                            'isi_id' => $isi->id,
                        ]);
                    }
                }
            }
        }
        toast('Data P3K berhasil dibuat', 'success');
        return redirect('/p3k/datap3k');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataP3k $datap3k
     * @return \Illuminate\Http\Response
     */
    public function show(DataP3k $datap3k)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataP3k $datap3k
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provinsi = Provinsi::orderBy('name')->get();
        $datap3k = DataP3k::find($id);
        $zona = ZonaLokasi::all();
        $id_provinsi = Provinsi::where('name', $datap3k->provinsi)->first();
        $kota = Kota::where('province_id', $id_provinsi->id)->get();
        return view('supervisor.datap3k.edit', ['datap3k' => $datap3k, 'provinsi' => $provinsi, 'kota' => $kota, 'zona' => $zona]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataP3k $datap3k
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataP3k $datap3k)
    {
        $request->validate([
            'tipe' => 'required',
            'lokasi' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'zona_id' => 'required',
            'gedung' => 'required',
            'lantai' => 'required',
            'titik' => 'required',
            'keterangan' => 'required',
        ]);
        $nama_provinsi = Provinsi::where('id', $request->provinsi)->first();
        $request['provinsi'] =  Str::title(Str::lower($nama_provinsi->name));
        $datap3k->update($request->all());
        toast('Data P3K berhasil diubah', 'success');
        return redirect('/p3k/datap3k')->with('success', 'Data P3K Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataP3k $datap3k
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataP3k $datap3k)
    {
        $datap3k->update([
            'kd_p3k' => $datap3k->kd_p3k . date('ymdhis')
        ]);
        $datap3k->delete();
        toast('Data P3K berhasil dihapus', 'success');
        return redirect('/p3k/datap3k')->with('success', 'Data P3K Deleted');
    }

    public function export()
    {
        $spreadsheet = IOFactory::load('excelTemplate/Master P3K.xlsx');
        $row = 11;
        $no = 1;
        $spreadsheet->setActiveSheetIndex(0)->setCellValue("C8", date('d F Y'));
        foreach (DataP3k::all() as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue("A{$row}", "{$no}")
                ->setCellValue("B{$row}", "{$data->id}")
                ->setCellValue("C{$row}", "{$data->tipe}")
                ->setCellValue("D{$row}", "{$data->lokasi}")
                ->setCellValue("E{$row}", "{$data->provinsi}")
                ->setCellValue("F{$row}", "{$data->kota}")
                ->setCellValue("G{$row}", "{$data->zona}")
                ->setCellValue("H{$row}", "{$data->gedung}")
                ->setCellValue("I{$row}", "{$data->lantai}")
                ->setCellValue("J{$row}", "{$data->titik}")
                ->setCellValue("K{$row}", "{$data->keterangan}");
            $row++;
            $no++;
        }
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        ob_end_clean(); //
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=dataP3K_" . date('Ymdhis') . ".xlsx");
        $writer->save('php://output');
    }

    public function export_pdf()
    {
        $p3k = DataP3k::with('Zona')->get();

        $pdf = PDF::loadview('layouts.export_pdf_P3K', ['p3k' => $p3k]);
        $pdf->setPaper('A4', 'landscape');
        $file = "DataP3k_" . date('Ymdhis') . ".pdf";
        return $pdf->download($file);
    }
}
