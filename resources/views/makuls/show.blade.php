<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Makul</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        <h2>Detail Makul</h2>

        <div class="card">
            <div class="card-header">
                Detail Makul
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <td>{{ $makul->id }}</td>
                    </tr>
                    <tr>
                        <th>Kode Makul</th>
                        <td>{{ $makul->kd_makul }}</td>
                    </tr>
                    <tr>
                        <th>Nama Makul</th>
                        <td>{{ $makul->nama_makul }}</td>
                    </tr>
                    <tr>
                        <th>SKS</th>
                        <td>{{ $makul->sks }}</td>
                    </tr>
                </table>
                <a href="{{ route('makuls.index') }}" class="btn btn-md btn-primary">Kembali</a>
            </div>
        </div>
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
