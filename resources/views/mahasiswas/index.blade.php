<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Mahasiswa</title>
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
            background-color: #343a40; /* Warna latar belakang sidebar */
            color: #ffffff; /* Warna teks di sidebar */
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
        .table {
            background-color: #ffffff; /* Warna latar belakang tabel */
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
            <!-- Tambahkan item sidebar untuk tabel lain jika diperlukan -->
        </ul>
    </div>

    <div class="content">
        <h2>Data Mahasiswa</h2>

        <a href="{{ route('mahasiswas.create') }}" class="btn btn-md btn-success btn-action">Tambah Mahasiswa</a>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">NPM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tempat Lahir</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No Telpon</th>
                    <th style="width: 20%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mahasiswas as $mahasiswa)
                <tr>
                    <th>{{ $mahasiswa->id }}</th>
                    <td>{{ $mahasiswa->npm }}</td>
                    <td>{{ $mahasiswa->nama }}</td>
                    <td>{{ $mahasiswa->tempat_lahir }}</td>
                    <td>{{ $mahasiswa->tgl_lahir }}</td>
                    <td>{{ $mahasiswa->jenis_kelamin }}</td>
                    <td>{{ $mahasiswa->alamat }}</td>
                    <td>{{ $mahasiswa->telp }}</td>
                    <td>
                        <a href="{{ route('mahasiswas.show', $mahasiswa->id) }}" class="btn btn-sm btn-dark">Detail</a>
                        <a href="{{ route('mahasiswas.edit', $mahasiswa->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('mahasiswas.destroy', $mahasiswa->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">Data Mahasiswa belum tersedia.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{ $mahasiswas->links() }}
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        // message with toastr
        @if(session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 
        @elseif(session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!'); 
        @endif
    </script>
</body>
</html>
