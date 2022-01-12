@extends('admin.layouts.app')

@section('container')
<div class="container container-fluid mb-3 d-flex justify-content-center">
    <h2 class="h3 text-uppercase">Data Koleksi</h2>
</div>
<div class="container container-fluid">
    <table class="table table-responsive table-striped">
    <tbody>
    <tr>
        <th scope="row">Nama Koleksi</th>
        <td>{!! $koleksis[0]->nama !!}</td>
    </tr>
    <tr>
        <th scope="row">Klasifikasi</th>
        <td>{!! $koleksis[0]->klasifikasi !!}</td>
    </tr>
    </tbody>
    </table>
</div>
<div class="container container-fluid d-flex justify-content-start">
    <a href="/koleksi" class="btn btn-danger">Back</a>
</div>
@endsection
