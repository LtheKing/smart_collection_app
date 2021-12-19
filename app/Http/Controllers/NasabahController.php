<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\NasabahExport;
use App\Imports\NasabahImport;
use DB;
use Artisan;

class NasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nasabahs = Nasabah::all();
        return view('Nasabah.index', compact('nasabahs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Nasabah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $request->validate([
            'Nama' => 'required',
            'NoRekening' => 'required',
            'NIK' => 'required',
            'NoTelepon' => 'required',
            'Alamat' => 'required',
            'Email' => 'required',
        ]);

        Nasabah::create($request->all());
        return redirect()->route('nasabah_index')->with('Success', 'Data Nasabah Telah Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Artisan::call('cache:clear');
        $nasabah = Nasabah::find($id);
        return view('Nasabah.detail', compact('nasabah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Artisan::call('cache:clear');
        $nasabah = Nasabah::find($id);
        return view('Nasabah.edit', compact('nasabah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'Nama' => 'required',
            'NoRekening' => 'required',
            'NIK' => 'required',
            'NoTelepon' => 'required',
            'Alamat' => 'required',
            'Email' => 'required',
        ]);

        $data = Nasabah::find($id);
        $data->update($request->all());
        return redirect()->route('nasabah_index')->with('Success', 'Data Nasabah Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function export_excel()
    {
        return Excel::download(new NasabahExport, 'Nasabah.xlsx');
    }

    public function import_excel(Request $request) 
    {
        // dd($request->all());
        Excel::import(new NasabahImport, $request->file('file'));
           
        return back();
    }

    public function checkingResult(){
        // return Nasabah::all();
        $data = Nasabah::all();
        foreach ($data as $value) {
            $value->NIK = (int)$value->NIK;
        }

        return $data;
    }

    //API

    public function getNasabahArray()
    {
        $nasabahs = DB::table('sm_nasabah')->get();
        $data = (object)[
            'data' => $nasabahs
        ];
        // array_push($data->data, $nasabahs);
        return $data;
    }
}
