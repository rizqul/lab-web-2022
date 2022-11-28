<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <form action="/edit/{{ $data->id }}" method="POST">
         @csrf
        <div class="mb-3 row">
            <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nim" name="nim" value="{{ $data['nim'] }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $data['nama'] }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $data['alamat'] }}">
                </div>
        </div>
        <div class="mb-3 row">
            <label for="fakultas" class="col-sm-2 col-form-label">Fakultas</label>
            <div class="col-sm-10">
                <select class="form-control" name="fakultas" id="fakultas">
                    <option value="">{{ $data['fakultas'] }}</option>
                    <option value="MIPA">MIPA</option>
                    <option value="Farmasi">Farmasi</option>
                    <option value="Kedokteran">Kedokteran</option>
                    <option value="Pertanian">Pertanian</option>
                </select>
            </div>
        </div>
        <div class="col-12">
            <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
        </div> <br>
    </form>
</body>
