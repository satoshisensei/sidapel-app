@extends('admin.layouts.app')

@section('container')
<div class="container container-fluid mb-3 d-flex justify-content-center">
    <h2 class="h3 text-uppercase">Data {!! $peminjamans[0]->member->nama !!}</h2>
</div>
<div class="container container-fluid">
    <table class="table table-responsive table-striped d-flex justify-content-center">
    <tbody>
    <tr>
        <th scope="row">Nama Peminjaman</th>
        <td>{!! $peminjamans[0]->member->nama !!}</td>
    </tr>
    <tr>
        <th scope="row">Koleksi yang dipinjam</th>
        <td>{!! $peminjamans[0]->koleksi->nama !!}</td>
    </tr>
    <tr>
        <th scope="row">Tanggal Meminjam</th>
        <td>{!! $peminjamans[0]->tanggal !!}</td>
    </tr>
    </tbody>
    </table>
</div>
<div class="container container-fluid d-flex justify-content-center">
    <a href="/peminjaman" class="btn btn-danger">Back</a>
</div>
@endsection