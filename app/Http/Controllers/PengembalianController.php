<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Koleksi;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pengembalian.index',[
            'pengembalians' => Pengembalian::latest()->with(['member','koleksi'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengembalian.create',[
            'koleksis' => Koleksi::get(),
            'members' => Member::get()
        ]);
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
            'tanggal' => 'required|date',
            'member_id' => 'required',
            'koleksi_id' => 'required'
        ]);

        $validate['user_id'] = auth()->user()->id;

        Pengembalian::create($validate);

        return redirect('/pengembalian')->with('success','Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function show(Pengembalian $pengembalian)
    {
        $kembali = Pengembalian::with(['member','koleksi'])->find($pengembalian);
        return view('admin.peminjaman.show',[
            'peminjamans' => $kembali
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengembalian $pengembalian)
    {
        return view('admin.pengembalian.edit',[
            'pengembalians' => Pengembalian::find($pengembalian),
            'members' => Member::get(),
            'koleksis' => Koleksi::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengembalian $pengembalian)
    {
        $rules = [
            'tanggal' => 'required',
        ];

        if($pengembalian->member != $request->member){
            $rules['member_id'] = 'required';
        }

        if($pengembalian->koleksi != $request->koleksi){
            $rules['koleksi_id'] = 'required';
        }

        $validate['user_id'] = auth()->user()->id;
        $validate = $request->validate($rules);

        Pengembalian::where('id',$pengembalian->id)->update($validate);

        return redirect('/pengembalian')->with('success','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengembalian $pengembalian)
    {
        Pengembalian::destroy($pengembalian->id);

        return redirect('/pengembalian')->with('success','Deleted Successfully!');
    }

    public function data()
    {
        return Datatables::of(Pengembalian::query())->make(true);
    }
}
