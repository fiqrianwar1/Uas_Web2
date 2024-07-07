<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            padding-top: 20px;
            background-color: #343a40;
            color: #ffffff;
        }
        .sidebar h4 {
            color: #ffffff;
        }
        .sidebar .nav-link {
            font-size: 16px;
            color: #ffffff;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .content h2 {
            margin-bottom: 20px;
        }
        .btn-action {
            margin-bottom: 10px;
        }
        .form-control {
            margin-bottom: 10px;
        }
        .table {
            background-color: #ffffff;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h4 class="ml-3 mt-3 mb-4">Pilih Tabel</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('mahasiswas.index') }}">Mahasiswa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('makuls.index') }}">Makul</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('nilais.index') }}">Nilai</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dosens.index') }}">Dosen</a>
            </li>
        </ul>
    </div>

    <div class="content">
        <h2>Edit Mahasiswa</h2>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('mahasiswas.update', $mahasiswa->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="text" class="form-control" id="id" name="id" value="{{ $mahasiswa->id }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="npm">NPM</label>
                        <input type="text" class="form-control" id="npm" name="npm" value="{{ $mahasiswa->npm }}" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $mahasiswa->nama }}" required>
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $mahasiswa->tempat_lahir }}" required>
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ $mahasiswa->tgl_lahir }}" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="L" {{ $mahasiswa->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                            <option value="P" {{ $mahasiswa->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ $mahasiswa->alamat }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="telp">No Telpon</label>
                        <input type="text" class="form-control" id="telp" name="telp" value="{{ $mahasiswa->telp }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('mahasiswas.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(session('success'))
            toastr.success("{{ session('success') }}");
        @endif
    </script>
</body>
</html>
