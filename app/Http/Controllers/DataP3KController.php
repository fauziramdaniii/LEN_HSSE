<?php

namespace App\Http\Controllers;

use App\Models\IsiP3K;
use App\Models\DataP3K;
use App\Models\InspeksiP3K;
use App\Models\IsiInspeksi;
use Illuminate\Http\Request;
use App\Models\MasterInspeksiP3K;
use PhpOffice\PhpSpreadsheet\IOFactory;

class DataP3KController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datap3k = DataP3K::all();
        return view('supervisor.datap3k.index', compact('datap3k'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supervisor.datap3k.create');
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
            'id' => 'required',
            'tipe' => 'required',
            'lokasi' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'zona' => 'required',
            'gedung' => 'required',
            'lantai' => 'required',
            'titik' => 'required',
            'keterangan' => 'required',
        ]);
        $p3k = DataP3K::create($request->all());
        $periodeNow = MasterInspeksiP3K::whereDate('periode', '>=', date('Y-m-01'))->get();
        if (!empty($periodeNow)) {
            foreach ($periodeNow as $periode) {
                $createInspeksi = InspeksiP3K::create([
                    'periode_id' => $periode->id,
                    'p3k_id' => $p3k->id,
                    'status' => 'Belum Inspeksi',
                ]);
                if ($createInspeksi) {
                    switch ($p3k->tipe) {
                        case 'A':
                            $isi = IsiP3K::where('tipe', 'A')->get();
                            break;
                        case 'B':
                            $isi = IsiP3K::where('tipe', 'B')->get();
                            break;
                        case 'C':
                            $isi = IsiP3K::where('tipe', 'C')->get();
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
     * @param  \App\Models\DataP3K $datap3k
     * @return \Illuminate\Http\Response
     */
    public function show(DataP3K $datap3k)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataP3K $datap3k
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datap3k = DataP3K::find($id);
        return view('supervisor.datap3k.edit', ['datap3k' => $datap3k]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataP3K $datap3k
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataP3K $datap3k)
    {
        $request->validate([
            'id' => 'required',
            'tipe' => 'required',
            'lokasi' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'zona' => 'required',
            'gedung' => 'required',
            'lantai' => 'required',
            'titik' => 'required',
            'keterangan' => 'required',
        ]);

        $datap3k->update($request->all());
        toast('Data P3K berhasil diubah', 'success');
        return redirect('/p3k/datap3k')->with('success', 'Data P3K Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataP3K $datap3k
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataP3K $datap3k)
    {
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
        foreach (DataP3K::all() as $data) {
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
}
