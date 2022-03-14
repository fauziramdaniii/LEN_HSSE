<?php

namespace App\Http\Controllers;

use App\Models\DataApar;
use App\Models\AparInspeksi;
use Illuminate\Http\Request;
use App\Models\MasterInspeksi;
use App\Models\DetailInpeksiApar;
use Exception;
use PhpOffice\PhpSpreadsheet\IOFactory;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

class AparInspeksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periode = MasterInspeksi::orderBy('periode')->get();
        return view('inpeksiApar.inpeksi', compact('periode'));
    }

    public function detailInspeksi(MasterInspeksi $periode)
    {
        $aparinspeksi = $periode->load('DetailInspeksi');
        $sudahInspeksi = $periode->DetailInspeksi->whereNotNull('jenis')->count();
        $belumInspeksi = $periode->DetailInspeksi->whereNull('jenis')->count();
        return view('inpeksiApar.status', compact('aparinspeksi', 'sudahInspeksi', 'belumInspeksi'));
    }

    // public function status()
    // {
    //     $periode = MasterInspeksi::whereMonth('periode', date('m'))->whereYear('periode', date('Y'))->first();

    //     if (!empty($periode)) {
    //         $aparinspeksi = DetailInpeksiApar::where('periode_id', $periode->id)->with('Apart')->get();

    //         return view('inpeksiApar.status', compact('aparinspeksi', 'periode'));
    //     } else {
    //         return view('inpeksiApar.status');
    //     }
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(MasterInspeksi $periode)
    {
        $aparinspeksi =  $periode->load(['DetailInspeksi' => function ($query) {
            $query->whereNull('tanggal')->get();
        }]);
        return view('inpeksiApar.isiInpeksi', compact('aparinspeksi'));
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
            'jenis' => 'required',
            'noozle' => 'required',
            'selang' => 'required',
            'tabung' => 'required',
            'rambu' => 'required',
            'label' => 'required',
            'cat' => 'required',
            'pin' => 'required',
            'roda' => 'required',
            'keterangan' => 'required',
            'tanggal' => 'required',
        ]);
        if (empty($request->bukti)) {
            toast('Ambil Foto terlebih dahulu!', 'error');
            return back();
        }
        try {
            $img = $request->bukti;
            $folderPath = "foto_inspeksi_apar/";
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = uniqid() . '.jpeg';
            $file = $folderPath . $fileName;
            file_put_contents($file, $image_base64);
        } catch (Exception $e) {
            return back();
        }
        $request['foto'] = $fileName;
        $apart = DetailInpeksiApar::with('periode', 'Apart')->where('id', $request->id)->first();
        $apart->update($request->all());

        if ($request->keterangan == 'Service') {
            $apart->Apart->update([
                'keterangan' => 'Service'
            ]);
        }

        toast('Inspeksi berhasil diinput', 'success');
        return redirect('/apar/inspeksi/' . $apart->periode->id)->with('success', 'apar inspeksi saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\aparinspeksi  $aparinspeksi
     * @return \Illuminate\Http\Response
     */
    public function show(aparinspeksi $aparinspeksi)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\aparinspeksi  $aparinspeksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\aparinspeksi  $aparinspeksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, aparinspeksi $aparinspeksi)
    {
        $request->validate([
            'jenis' => 'required',
            'noozle' => 'required',
            'selang' => 'required',
            'tabung' => 'required',
            'rambu' => 'required',
            'label' => 'required',
            'cat' => 'required',
            'pin' => 'required',
            'roda' => 'required',
            'keterangan' => 'required',
            'foto' => 'required',
        ]);

        $aparinspeksi->update($request->all());

        return redirect('statusapar')->with('success', 'Data Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\aparinspeksi  $aparinspeksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(aparinspeksi $aparinspeksi)
    {
        $aparinspeksi->delete();
        return redirect('aparinspeksi')->with('success', 'Data Apar Deleted');
    }

    public function hasil(DetailInpeksiApar $id)
    {
        $apar = $id->load('Apart');
        return response()->json(['data' => $id, 'apar' => $apar->Apart]);
    }

    public function exportTahunan(DataApar $id)
    {
        $spreadsheet = IOFactory::load('excelTemplate/Lembar Pemeriksaan APAR.xlsx');
        $row = 13;
        $no = 1;
        $periode = MasterInspeksi::whereYear('periode', date('Y'))->orderBy('periode', 'asc')->get();
        $inspeksi = [];
        foreach ($periode as $data) {
            $hasil = DetailInpeksiApar::where('periode_id', $data->id)->where('apart_id', $id->id)->first();
            switch (date('m', strtotime($data->periode))) {
                case '01':
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue("C13", "{$hasil->jenis}")
                        ->setCellValue("D13", "{$hasil->noozle}")
                        ->setCellValue("E13", "{$hasil->selang}")
                        ->setCellValue("F13", "{$hasil->tabung}")
                        ->setCellValue("G13", "{$hasil->rambu}")
                        ->setCellValue("H13", "{$hasil->label}")
                        ->setCellValue("I13", "{$hasil->cat}")
                        ->setCellValue("J13", "{$hasil->pin}")
                        ->setCellValue("K13", "{$hasil->roda}")
                        ->setCellValue("L13", "{$hasil->keterangan}");
                    break;

                case '02':
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue("C14", "{$hasil->jenis}")
                        ->setCellValue("D14", "{$hasil->noozle}")
                        ->setCellValue("E14", "{$hasil->selang}")
                        ->setCellValue("F14", "{$hasil->tabung}")
                        ->setCellValue("G14", "{$hasil->rambu}")
                        ->setCellValue("H14", "{$hasil->label}")
                        ->setCellValue("I14", "{$hasil->cat}")
                        ->setCellValue("J14", "{$hasil->pin}")
                        ->setCellValue("K14", "{$hasil->roda}")
                        ->setCellValue("L14", "{$hasil->keterangan}");
                    break;

                case '03':
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue("C15", "{$hasil->jenis}")
                        ->setCellValue("D15", "{$hasil->noozle}")
                        ->setCellValue("E15", "{$hasil->selang}")
                        ->setCellValue("F15", "{$hasil->tabung}")
                        ->setCellValue("G15", "{$hasil->rambu}")
                        ->setCellValue("H15", "{$hasil->label}")
                        ->setCellValue("I15", "{$hasil->cat}")
                        ->setCellValue("J15", "{$hasil->pin}")
                        ->setCellValue("K15", "{$hasil->roda}")
                        ->setCellValue("L15", "{$hasil->keterangan}");
                    break;

                case '04':
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue("C16", "{$hasil->jenis}")
                        ->setCellValue("D16", "{$hasil->noozle}")
                        ->setCellValue("E16", "{$hasil->selang}")
                        ->setCellValue("F16", "{$hasil->tabung}")
                        ->setCellValue("G16", "{$hasil->rambu}")
                        ->setCellValue("H16", "{$hasil->label}")
                        ->setCellValue("I16", "{$hasil->cat}")
                        ->setCellValue("J16", "{$hasil->pin}")
                        ->setCellValue("K16", "{$hasil->roda}")
                        ->setCellValue("L16", "{$hasil->keterangan}");
                    break;

                case '05':
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue("C17", "{$hasil->jenis}")
                        ->setCellValue("D17", "{$hasil->noozle}")
                        ->setCellValue("E17", "{$hasil->selang}")
                        ->setCellValue("F17", "{$hasil->tabung}")
                        ->setCellValue("G17", "{$hasil->rambu}")
                        ->setCellValue("H17", "{$hasil->label}")
                        ->setCellValue("I17", "{$hasil->cat}")
                        ->setCellValue("J17", "{$hasil->pin}")
                        ->setCellValue("K17", "{$hasil->roda}")
                        ->setCellValue("L17", "{$hasil->keterangan}");
                    break;

                case '06':
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue("C18", "{$hasil->jenis}")
                        ->setCellValue("D18", "{$hasil->noozle}")
                        ->setCellValue("E18", "{$hasil->selang}")
                        ->setCellValue("F18", "{$hasil->tabung}")
                        ->setCellValue("G18", "{$hasil->rambu}")
                        ->setCellValue("H18", "{$hasil->label}")
                        ->setCellValue("I18", "{$hasil->cat}")
                        ->setCellValue("J18", "{$hasil->pin}")
                        ->setCellValue("K18", "{$hasil->roda}")
                        ->setCellValue("L18", "{$hasil->keterangan}");
                    break;

                case '07':
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue("C19", "{$hasil->jenis}")
                        ->setCellValue("D19", "{$hasil->noozle}")
                        ->setCellValue("E19", "{$hasil->selang}")
                        ->setCellValue("F19", "{$hasil->tabung}")
                        ->setCellValue("G19", "{$hasil->rambu}")
                        ->setCellValue("H19", "{$hasil->label}")
                        ->setCellValue("I19", "{$hasil->cat}")
                        ->setCellValue("J19", "{$hasil->pin}")
                        ->setCellValue("K19", "{$hasil->roda}")
                        ->setCellValue("L19", "{$hasil->keterangan}");
                    break;

                case '08':
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue("C20", "{$hasil->jenis}")
                        ->setCellValue("D20", "{$hasil->noozle}")
                        ->setCellValue("E20", "{$hasil->selang}")
                        ->setCellValue("F20", "{$hasil->tabung}")
                        ->setCellValue("G20", "{$hasil->rambu}")
                        ->setCellValue("H20", "{$hasil->label}")
                        ->setCellValue("I20", "{$hasil->cat}")
                        ->setCellValue("J20", "{$hasil->pin}")
                        ->setCellValue("K20", "{$hasil->roda}")
                        ->setCellValue("L20", "{$hasil->keterangan}");
                    break;

                case '09':
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue("C21", "{$hasil->jenis}")
                        ->setCellValue("D21", "{$hasil->noozle}")
                        ->setCellValue("E21", "{$hasil->selang}")
                        ->setCellValue("F21", "{$hasil->tabung}")
                        ->setCellValue("G21", "{$hasil->rambu}")
                        ->setCellValue("H21", "{$hasil->label}")
                        ->setCellValue("I21", "{$hasil->cat}")
                        ->setCellValue("J21", "{$hasil->pin}")
                        ->setCellValue("K21", "{$hasil->roda}")
                        ->setCellValue("L21", "{$hasil->keterangan}");
                    break;

                case '10':
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue("C22", "{$hasil->jenis}")
                        ->setCellValue("D22", "{$hasil->noozle}")
                        ->setCellValue("E22", "{$hasil->selang}")
                        ->setCellValue("F22", "{$hasil->tabung}")
                        ->setCellValue("G22", "{$hasil->rambu}")
                        ->setCellValue("H22", "{$hasil->label}")
                        ->setCellValue("I22", "{$hasil->cat}")
                        ->setCellValue("J22", "{$hasil->pin}")
                        ->setCellValue("K22", "{$hasil->roda}")
                        ->setCellValue("L22", "{$hasil->keterangan}");
                    break;

                case '11':
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue("C23", "{$hasil->jenis}")
                        ->setCellValue("D23", "{$hasil->noozle}")
                        ->setCellValue("E23", "{$hasil->selang}")
                        ->setCellValue("F23", "{$hasil->tabung}")
                        ->setCellValue("G23", "{$hasil->rambu}")
                        ->setCellValue("H23", "{$hasil->label}")
                        ->setCellValue("I23", "{$hasil->cat}")
                        ->setCellValue("J23", "{$hasil->pin}")
                        ->setCellValue("K23", "{$hasil->roda}")
                        ->setCellValue("L23", "{$hasil->keterangan}");
                    break;

                case '12':
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue("C24", "{$hasil->jenis}")
                        ->setCellValue("D24", "{$hasil->noozle}")
                        ->setCellValue("E24", "{$hasil->selang}")
                        ->setCellValue("F24", "{$hasil->tabung}")
                        ->setCellValue("G24", "{$hasil->rambu}")
                        ->setCellValue("H24", "{$hasil->label}")
                        ->setCellValue("I24", "{$hasil->cat}")
                        ->setCellValue("J24", "{$hasil->pin}")
                        ->setCellValue("K24", "{$hasil->roda}")
                        ->setCellValue("L24", "{$hasil->keterangan}");
                    break;

                default:
                    break;
            }
        }

        $spreadsheet->setActiveSheetIndex(0)->setCellValue("C7", "{$id->jenis}");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue("C8", "{$id->lokasi}");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue("C9", "{$id->id}");
        $spreadsheet->setActiveSheetIndex(0)->setCellValue("C10", date('Y'));
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        ob_end_clean(); //
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=InspeksiTahunan_" . date('Ymdhis') . ".xlsx");
        $writer->save('php://output');
    }

    public function exportTahunan_pdf(DataApar $id)
    {
        $bulan = [
            [
                'key' => '01',
                'bulan' => 'Januari'
            ],
            [
                'key' => '02',
                'bulan' => 'Februari'
            ],
            [
                'key' => '03',
                'bulan' => 'Maret'
            ],
            [
                'key' => '04',
                'bulan' => 'April'
            ],
            [
                'key' => '05',
                'bulan' => 'Mei'
            ],
            [
                'key' => '06',
                'bulan' => 'Juni'
            ],
            [
                'key' => '07',
                'bulan' => 'Juli'
            ],
            [
                'key' => '08',
                'bulan' => 'Agustus'
            ],
            [
                'key' => '09',
                'bulan' => 'September'
            ],
            [
                'key' => '10',
                'bulan' => 'Oktober'
            ],
            [
                'key' => '11',
                'bulan' => 'November'
            ],
            [
                'key' => '12',
                'bulan' => 'Desember'
            ],
        ];
        $periode = MasterInspeksi::whereYear('periode', date('Y'))->orderBy('periode', 'asc')->get();
        $apar = $id;
        $pdf = PDF::loadview('layouts.export_pdf_APAR_tahun', ['periode' => $periode, 'apar' => $apar, 'bulan' => $bulan]);
        $pdf->setPaper('A4', 'landscape');
        $file = "InspeksiTahunan_" . date('Ymdhis') . ".pdf";
        return $pdf->download($file);
    }
}
