@extends('admin.layouts.app')

@section('container')
<div class="container container-fluid mb-3 d-flex justify-content-center">
    <h2 class="h3 text-uppercase">Data {!! $pengembalians[0]->member->nama !!}</h2>
</div>
<div class="container container-fluid">
    <table class="table table-responsive table-striped d-flex justify-content-center">
    <tbody>
    <tr>
        <th scope="row">Nama pengembalian</th>
        <td>{!! $pengembalians[0]->member->nama !!}</td>
    </tr>
    <tr>
        <th scope="row">Koleksi yang dipinjam</th>
        <td>{!! $pengembalians[0]->koleksi->nama !!}</td>
    </tr>
    <tr>
        <th scope="row">Tanggal Meminjam</th>
        <td>{!! $pengembalians[0]->tanggal !!}</td>
    </tr>
    </tbody>
    </table>
</div>
<div class="container container-fluid d-flex justify-content-center">
    <a href="/pengembalian" class="btn btn-danger">Back</a>
</div>
@endsection