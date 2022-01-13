<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Category;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\Pengunjung;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class KunjunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pengunjung.index',[
            'pengunjungs' => Pengunjung::latest()->with(['category','pendidikan','pekerjaan','gender'])->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengunjung.create',[
            'categories' => Category::get(),
            'pendidikans' => Pendidikan::get(),
            'pekerjaans' => Pekerjaan::get(),
            'genders' => Gender::get()
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
            'nama' => 'required|max:255',
            'nomor' => 'required',
            'tujuan' => 'required',
        ]);

        if($request->category){
            $validate['category_id'] = 'required';
        }

        if($request->pendidikan){
            $validate['pendidikan_id'] = 'required';
        }

        if($request->pekerjaan){
            $validate['pekerjaan_id'] = 'required';
        }

        if($request->gender){
            $validate['gender_id'] = 'required';
        }

        $validate['user_id'] = auth()->user()->id;

        Pengunjung::create($validate);
        return redirect('/pengunjung')->with('success','Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengunjung  $pengunjung
     * @return \Illuminate\Http\Response
     */
    public function show(Pengunjung $pengunjung)
    {
        return view('admin.pengunjung.show',[
            'pengunjungs' => Pengunjung::with(['category','pendidikan','pekerjaan','gender'])->find($pengunjung),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengunjung  $pengunjung
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengunjung $pengunjung)
    {
        return view('admin.pengunjung.edit',[
            'pengunjungs' => Pengunjung::find($pengunjung),
            'categories' => Category::get(),
            'pendidikans' => Pendidikan::get(),
            'pekerjaans' => Pekerjaan::get(),
            'genders' => Gender::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengunjung  $pengunjung
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengunjung $pengunjung)
    {
        $rules = [
            'nama' => 'required|max:255',
            'nomor' => 'required',
            'tujuan' => 'required',
        ];

        if($pengunjung->category != $request->category){
            $rules['category_id'] = 'required';
        }

        if($pengunjung->pendidikan != $request->pendidikan){
            $rules['pendidikan_id'] = 'required';
        }

        if($pengunjung->pekerjaan != $request->pekerjaan){
            $rules['pekerjaan_id'] = 'required';
        }

        if($pengunjung->gender != $request->gender){
            $rules['gender_id'] = 'required';
        }

        $validate['user_id'] = auth()->user()->id;
        $validate = $request->validate($rules);

        Pengunjung::where('id',$pengunjung->id)->update($validate);
        return redirect('/pengunjung')->with('success','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengunjung  $pengunjung
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengunjung $pengunjung)
    {
        Pengunjung::destroy($pengunjung->id);

        return redirect('/pengunjung')->with('success','Deleted Successfully!');
    }

    public function data()
    {
        return Datatables::of(Pengunjung::query())->make(true);
    }
}
