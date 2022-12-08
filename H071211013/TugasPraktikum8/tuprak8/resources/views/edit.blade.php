@extends('layout')

@section('content')
            <div class="card-header">
                <h4> Edit Data </h4> 
            </div>
            <div class="card-body">
                <form action="/update/{{ $buku->id }}" method="post">
                    @csrf
                    <div class="mb-3 row">
                        <label for="id" class="col-sm-2 col-form-label">ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id" name="id_buku" value={{ $buku->id_buku }}>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value={{ $buku->nama }}>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat" value={{ $buku->alamat }}>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="judul" class="col-sm-2 col-form-label">Judul Buku</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="judul" name="judul" value={{ $buku->judul }}>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="pinjam" class="col-sm-2 col-form-label">Tanggal Peminjaman</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="pinjam" name="pinjam" value={{ $buku->pinjam }} required>
                        </div>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary"> Add Data </button> 
                    </div>
                </form>
            </div>

            hello
@endsection