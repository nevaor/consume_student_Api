<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consume students REST API ||Trash</title>
</head>
<body>
    @if (Session::get('errors'))
    <p>{{Session::get('errors')}}</p>
    @endif
    @if (Session::get('success'))
    <p style="color: green;">{{Session::get('success')}}</p>
    @endif
    <a href="/">kembali</a>
    @foreach ($studentsTrash as $student)
    <ol>
        <li>NIS : {{ $student['nis'] }}</li>
        <li>NAMA : {{ $student['nama'] }}</li>
        <li>ROMBEL : {{ $student['rombel'] }}</li>
        <li>RAYON : {{ $student['rayon'] }}</li>
        <li>Di hapus Tanggal : {{ \Carbon\Carbon::parse($student['deleted_at'])->format('j F, Y') }}</li>
        <li>
            <a href="{{ route('restore', $student['id'])}}">Kembalika Data</a>
            <a href="{{ route('permanent', $student['id'])}}">Hapus Data Permanent</a>
        </li>
    </ol>
    @endforeach
</body>
</html>