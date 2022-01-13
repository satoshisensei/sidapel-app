{{-- @dd($anggotas[0]) --}}
@extends('admin.layouts.app')

@section('container')
<div class="container container-fluid mb-3 d-flex justify-content-center">
    <h2 class="h3 text-uppercase">Data {!! $anggotas[0]->nama !!}</h2>
</div>
<div class="container container-fluid">
    <table class="table table-responsive table-striped d-flex justify-content-center">
    <tbody>
    <tr>
        <th scope="row">Nama</th>
        <td>{!! $anggotas[0]->nama !!}</td>
    </tr>
    <tr>
        <th scope="row">Klasifikasi</th>
        <td>{!! $anggotas[0]->nomor !!}</td>
    </tr>
    <tr>
        <th scope="row">Category</th>
        <td>{!! $anggotas[0]->category->jenis !!}</td>
    </tr>
    <tr>
        <th scope="row">Pendidikan</th>
        <td>{!! $anggotas[0]->pendidikan->tingkat !!}</td>
    </tr>
    <tr>
        <th scope="row">Pekerjaan</th>
        <td>{!! $anggotas[0]->pekerjaan->nama !!}</td>
    </tr>
    </tbody>
    </table>
</div>
<div class="container container-fluid d-flex justify-content-center">
    <a href="/member" class="btn btn-danger">Back</a>
</div>
@endsection
