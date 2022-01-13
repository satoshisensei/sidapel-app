<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Koleksi;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.peminjaman.index',[
            'peminjamans' => Peminjaman::latest()->with(['member','koleksi'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.peminjaman.create',[
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

        Peminjaman::create($validate);

        return redirect('/peminjaman')->with('success','Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjaman $peminjaman)
    {
        $pinjam = Peminjaman::with(['member','koleksi'])->find($peminjaman);
        return view('admin.peminjaman.show',[
            'peminjamans' => $pinjam
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit(Peminjaman $peminjaman)
    {
        return view('admin.peminjaman.edit',[
            'peminjamans' => Peminjaman::find($peminjaman),
            'members' => Member::get(),
            'koleksis' => Koleksi::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $rules = [
            'tanggal' => 'required',
        ];

        if($peminjaman->member != $request->member){
            $rules['member_id'] = 'required';
        }

        if($peminjaman->koleksi != $request->koleksi){
            $rules['koleksi_id'] = 'required';
        }

        $validate['user_id'] = auth()->user()->id;
        $validate = $request->validate($rules);

        Peminjaman::where('id',$peminjaman->id)->update($validate);

        return redirect('/peminjaman')->with('success','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjaman $peminjaman)
    {
        Peminjaman::destroy($peminjaman->id);

        return redirect('/peminjaman')->with('success','Deleted Successfully!');
    }

    public function data()
    {
        return Datatables::of(Peminjaman::query())->make(true);
    }
}
