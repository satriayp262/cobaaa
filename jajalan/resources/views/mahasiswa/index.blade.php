@extends('layout.template')
<!-- START DATA -->
@section('content')
    <a href="/">Home</a>
    <a href="/about">About</a>
    <a href="/mahasiswa">Mahasiswa</a>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="text-center">
            <h3>DATA MAHASISWA</h3>
        </div>
        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
            <a href='{{ url('mahasiswa/create') }}' class="btn btn-primary">+ Tambah Data</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-3">Nama</th>
                    <th class="col-md-4">NIM</th>
                    <th class="col-md-2">Alamat</th>
                    <th class="col-md-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->nim }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>
                            <a href='{{ url('mahasiswa/' . $item->nim . '/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                            <form onclick="return confirm('yakin akan menghapus data?')" method="post" class='d-inline'
                                action="{{ url('mahasiswa/' . $item->nim) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                            </form>
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
