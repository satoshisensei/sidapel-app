
@extends('admin.layouts.app')

@section('container')
<div class="container container-fluid mb-3 d-flex justify-content-center">
    <h2 class="h3 text-uppercase">Data {{ $pengunjungs[0]->nama }}</h2>
</div>
<div class="container container-fluid">
    <table class="table table-responsive table-striped d-flex justify-content-center">
    <tbody>
    <tr>
        <th scope="row">Nama</th>
        <td>{!! $pengunjungs[0]->nama !!}</td>
    </tr>
    <tr>
        <th scope="row">Klasifikasi</th>
        <td>{!! $pengunjungs[0]->nomor !!}</td>
    </tr>
    <tr>
        <th scope="row">Category</th>
        <td>{!! $pengunjungs[0]->category->jenis !!}</td>
    </tr>
    <tr>
        <th scope="row">Pendidikan</th>
        <td>{!! $pengunjungs[0]->pekerjaan->nama !!}</td>
    </tr>
    <tr>
        <th scope="row">Pekerjaan</th>
        <td>{!! $pengunjungs[0]->pendidikan->tingkat !!}</td>
    </tr>
    </tbody>
    </table>
</div>
<div class="container container-fluid d-flex justify-content-center">
    <a href="/pengunjung" class="btn btn-danger">Back</a>
</div>
@endsection
