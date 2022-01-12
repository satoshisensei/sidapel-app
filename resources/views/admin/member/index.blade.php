@extends('admin.layouts.app')

@section('container')
    @if(session('success'))
        <div class="alert alert-success container container-fluid" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="container container-fluid d-flex justify-content-beetwen">
        <a href="/member/create" class="btn btn-success mb-3 me-lg-3"><i class="fas fa-plus-square"></i></a>
    </div>
        <div class="container container-fluid">
            <table class="table table-responsive table-striped" id="myTable">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama anggota</th>
                    <th scope="col">Nomor anggota</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($anggotas as $anggota)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{!! $anggota->nama !!}</td>
                    <td>{!! $anggota->nomor !!}</td>
                    <td>
                        <a href="/member/{{ $anggota->id }}" class="btn btn-info"><i class="fas fa-eye"></i></a>|
                        <a href="/member/{{ $anggota->id }}/edit" class="btn btn-warning"><i class="fas fa-edit"></i></a>|
                        <form action="/member/{{ $anggota->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger border-0" onclick="confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        @push('scripts')
        <script>
        $(function() {
            $('#anggotas-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('anggota-data') !!}',
                columns: [
                    { data: 'nama', name: 'nama' },
                    { data: 'nomor', name: 'nomor' },
                ]
            });
        });
        </script>
        @endpush
@endsection
