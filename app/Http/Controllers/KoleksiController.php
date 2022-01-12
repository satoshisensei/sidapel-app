<?php

namespace App\Http\Controllers;

use App\Models\Koleksi;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class KoleksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.koleksi.index',[
            'koleksis' => Koleksi::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.koleksi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'klasifikasi' => 'required',
        ]);

        Koleksi::create($validate);
        return redirect('/koleksi')->with('success','Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Koleksi  $koleksi
     * @return \Illuminate\Http\Response
     */
    public function show(Koleksi $koleksi)
    {
        return view('admin.koleksi.show',[
            'koleksis' => Koleksi::find($koleksi)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Koleksi  $koleksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Koleksi $koleksi)
    {
        return view('admin.koleksi.edit',[
            'koleksis' => Koleksi::find($koleksi)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Koleksi  $koleksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Koleksi $koleksi)
    {
        $rules = [
            'nama' => 'required',
            'klasifikasi' => 'required',
        ];

        $validate = $request->validate($rules);
        Koleksi::where('id',$koleksi->id)->update($validate);
        return redirect('/koleksi')->with('success','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Koleksi  $koleksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Koleksi $koleksi)
    {
        Koleksi::destroy($koleksi->id);

        return redirect('/koleksi')->with('success','Deleted Successfully!');
    }

    public function data()
    {
        return Datatables::of(Koleksi::query())->make(true);
    }
}
