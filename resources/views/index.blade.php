<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>consume REST API students</title>
</head>
<body>
        @foreach ($students as $student)
        <ol>
            <li>NIS : {{ $student['nis'] }}</li>
            <li>Nama : {{ $student['nama'] }}</li>
            <li>Rombel : {{ $student['rombel'] }}</li>
            <li>Rayon : {{ $student['rayon'] }}</li>

        </ol>
        @endforeach
</body>
</html>