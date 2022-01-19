<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apar;

class AparController extends Controller
{
    public function index()
    {
        $apars = Apar::all();
        return view('apar.index', compact('apars'));
    }
    public function create()
    {
        return view('apar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'clock_start' => 'required',
            'clock_finish' => 'required',
            'day' => 'required',
            'description' => 'required',
        ]);

        Apar::create($request->all());
        return redirect('/apar')->with('success', 'apar saved!');
    }

    public function edit($id)
    {
        $apar = Apar::find($id);
        return view('apar.edit', ['apar' => $apar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apar  $apar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apar $apar)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'clock_start' => 'required',
            'clock_finish' => 'required',
            'day' => 'required',
            'description' => 'required',
        ]);

        $apar->update($request->allll());
        return redirect('/apar')->with('succkess', 'Data Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apar  $Apar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apar $apar)
    {
        $apar->delete();
        return redirect('/apar')->with('success', 'Data Deleted');
    }
}
