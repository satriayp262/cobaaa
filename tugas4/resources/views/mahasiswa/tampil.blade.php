<!DOCTYPE html>
<html>

<head>
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <a href="/mahasiswa">Mahasiswa</a>
    <a href="/mahasiswa2">Mahasiswa Update</a>
    <a href="/nilai">Mahasiswa Nilai</a>
    <div class="container">
        <h1 class="my-4">Daftar Mahasiswa</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>IPK</th>
                    <th>Jurusan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswa as $mhs)
                    <tr>
                        <td>{{ $mhs->nim }}</td>
                        <td>{{ $mhs->nama }}</td>
                        <td>{{ $mhs->ipk }}</td>
                        <td>{{ $mhs->namajur ?? 'Tidak ada jurusan' }}</td> <!-- Menampilkan pesan jika namajur null -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
