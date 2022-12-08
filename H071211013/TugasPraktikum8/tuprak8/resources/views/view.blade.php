@extends('layout')

@section('content')
<div class="card border-secondary">
            <div class="card-header">
                <h4> Input Data </h4> 
            </div>
            <div class="card-body">
                <form action="/addbuku" method="post">
                    @csrf
                    <div class="mb-3 row">
                        <label for="id" class="col-sm-2 col-form-label">ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id" name="id_buku" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="judul" class="col-sm-2 col-form-label">Judul Buku</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="judul" name="judul" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="pinjam" class="col-sm-2 col-form-label">Tanggal Peminjaman</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="pinjam" name="pinjam" value="" required>
                        </div>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary"> Simpan </button> 
                    </div>
                </form>
            </div>
            <div class="card border-secondary">
            <div class="card-header">
                <h4> <b>Data Peminjaman Buku Perpustakaan Garuda</b> </h4> 
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"> # </th>
                            <th scope="col">ID</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Tanggal Peminjaman</th>
                            <th scope="col">Aksi</th>
                                 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td scope="row">{{$row->id_buku}}</td>
                                <td scope="row">{{$row->nama}}</td>
                                <td scope="row">{{$row->alamat}}</td>
                                <td scope="row">{{$row->judul}}</td>
                                <td scope="row">{{$row->pinjam}}</td>
                                <td scope="row">
                                    <a href='/edit/{{$row->id}}' class="btn btn-primary">Edit</a>
                                    <a href= '/delete/{{$row->id}}' class="btn btn-danger"> Delete </a>
                                </td> 
                            </tr>
                        @endforeach
                    </tbody>

                    
                    
                </table>
            </div>
        </div>
</div>
@endsection
