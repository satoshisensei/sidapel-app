<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Category;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.member.index',[
            'anggotas' => Member::latest()->with(['category','pendidikan','pekerjaan'])->get()
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
            'pekerjaans' => Pekerjaan::get()
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
            'category_id' => 'required',
            'pendidikan_id' => 'required',
            'pekerjaan_id' => 'required',
            'nama' => 'required|max:255',
            'nomor' => 'required',
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
            'anggotas' => Member::with(['category','pendidikan','pekerjaan'])->find($member),
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }
}
