<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Member;
use App\Models\Category;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.member.index',[
            'anggotas' => Member::latest()->with(['category','pendidikan','pekerjaan','gender'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.member.create',[
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
            'category_id' => 'required',
            'pendidikan_id' => 'required',
            'pekerjaan_id' => 'required',
            'gender_id' => 'required'
        ]);

        $validate['user_id'] = auth()->user()->id;

        Member::create($validate);
        return redirect('/member')->with('success','Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        return view('admin.member.show',[
            'anggotas' => Member::with(['category','pendidikan','pekerjaan','gender'])->find($member),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('admin.member.edit',[
            'members' => Member::find($member),
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
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $rules = [
            'nama' => 'required|max:255',
            'nomor' => 'required',
        ];

        if($request->category != $member->category){
            $rules['category_id'] = 'required';
        }

        if($request->gender != $member->gender){
            $rules['gender_id'] = 'required';
        }

        if($request->pendidikan != $member->pendidikan){
            $rules['pendidikan_id'] = 'required';
        }

        if($request->pekerjaan != $member->pekerjaan){
            $rules['pekerjaan_id'] = 'required';
        }

        $validate['user_id'] = auth()->user()->id;
        $validate = $request->validate($rules);

        Member::where('id',$member->id)->update($validate);
        return redirect('/member')->with('success','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        Member::destroy($member->id);

        return redirect('/member')->with('success','Deleted Successfully!');
    }

    public function data()
    {
        return Datatables::of(Member::query())->make(true);
    }
}
