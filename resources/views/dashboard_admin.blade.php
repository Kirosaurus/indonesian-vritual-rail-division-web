@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <style>
        .admin-table-body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            min-height: 100vh;
            margin: 0;
            padding: 40px 0;
        }

        .container {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            width: 90%;
            max-width: 900px;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: center;
        }

        table th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .tambah,
        .edit,
        .hapus {
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin: 2px;
        }

        .tambah {
            background-color: #007bff;
            color: #fff;
        }

        .edit {
            background-color: #ffc107;
            color: #000;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin: 2px;
        }

        .hapus {
            background-color: #dc3545;
            color: #fff;
        }
    </style>

    <div class="admin-table-body">
        <div class="container">
            <h2>Welcome $name</h2>
            <a href="" class="tambah">Tambah</a>

            <table>
                <thead>
                    <tr>
                        <th>database</th>
                        <th>database</th>
                        <th>database</th>
                        <th>database</th>
                        <th>action</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>database</td>
                        <td>database</td>
                        <td>database</td>
                        <td>database</td>
                        <td>
                            <a href="" class="edit">Edit</a>
                            <a href="" class="hapus">Hapus</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection