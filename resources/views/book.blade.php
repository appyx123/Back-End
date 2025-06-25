<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    table {
        border-collapse: collapse;
    }

    th, td {
        padding: 12px 15px;
        border: 1px solid #ddd;
    }

    th {
        background-color: #f4f4f4;
    }
</style>
<body>
    <table>
        <thead>
            <tr>
                <th>Judul Buku</th>
                <th>Pengguna</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->user->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
