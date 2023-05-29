<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consume Rest API students||create</title>
</head>
<body>
    <h2>Tambah Data Siswa Baru</h2>
    @if (Session::get('errors'))
    <p style="color: red ">{{ Session::get('errors') }}</p>  
    @endif
    <form action="{{ route('send') }}" method="POST">
    @csrf
    <div style= "display: flex; margin-bottom:15px">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" placeholder="Nama Anda...">
    </div>

    <div style= "display: flex; margin-bottom:15px">
        <label for="nis">Nis</label>
        <input type="number" name="nis" id="nis" placeholder="Nis Anda...">
    </div>

    <div style= "display: flex; margin-bottom:15px">
        <label for="rombel">Rombel</label>
        <select name="rombel" id="rombel">Rombel
            <option value="PPLG X">pplg x</option>
            <option value="PPLG XI">PPLG XI</option>
            <option value="PPLG XII">PPLG XII</option>
        </select>
    </div>

    <div style= "display: flex; margin-bottom:15px">
        <label for="rayon">Rayon</label>
        <input type="text" name="rayon" id="rayon" placeholder="contoh:wik 1">
    </div>
    <button type="submit">Kirim</button>
</form>
</body>
</html>