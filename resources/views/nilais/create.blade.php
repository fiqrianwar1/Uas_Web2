<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Nilai</title>
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
        <h2>Tambah Nilai</h2>

        <form action="{{ route('nilais.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="makul_id">Makul</label>
                <select class="form-control" @error('makul_id') is-invalid @enderror id="makul_id" name="makul_id" required>
                    <option value="">Pilih Mata Kuliah</option>
                    @foreach ($makuls as $makul)
                        <option value="{{ $makul->id }}">{{ $makul->kd_makul }} - {{ $makul->nama_makul }}</option>
                    @endforeach
                </select>
                @error('makul_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="mahasiswa_id">Mahasiswa</label>
                <select class="form-control" @error('mahasiswa_id') is-invalid @enderror id="mahasiswa_id" name="mahasiswa_id" required>
                    <option value="">Pilih Mahasiswa</option>
                    @foreach ($mahasiswas as $mahasiswa)
                        <option value="{{ $mahasiswa->id }}">{{ $mahasiswa->npm }} - {{ $mahasiswa->nama }}</option>
                    @endforeach
                </select>
                @error('mahasiswa_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nilai">Nilai</label>
                <input type="number" class="form-control" id="nilai" name="nilai" required>
            </div>

            <button type="submit" class="btn btn-md btn-primary">Simpan</button>
            <a href="{{ route('nilais.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(session('success'))
            toastr.success("{{ session('success') }}");
        @elseif(session('error'))
            toastr.error("{{ session('error') }}");
        @endif
    </script>
</body>
</html>
