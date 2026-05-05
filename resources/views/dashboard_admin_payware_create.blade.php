@extends('layouts.admin')

@section('title', 'Dashboard Admin Create')

@section('content')
    <style>

        .container {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            width: 400px;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        form label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        form input {
            width: 100%;
            padding: 8px 12px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .simpan {
            background-color: #007bff;
            color: #ffffff;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin: 2px;
            border: none;
            cursor: pointer;
        }

        .batal {
            background-color: #dc3545;
            color: #fff;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin: 2px;
        }
    </style>

    <div class="container">
        <h2>DATABASE</h2>

        <form action="proses_tambah.php" method="POST">
            <label for="judul">Database</label>
            <input type="text" name="judul" value="" required><br><br>

            <label for="penulis">Database</label>
            <input type="text" name="penulis" value="" required><br><br>

            <label for="penerbit">Database</label>
            <input type="text" name="penerbit" value="" required><br><br>

            <label for="tahun">Database</label>
            <input type="number" name="tahun" value="" required><br><br>

            <button type="submit" class="simpan">Simpan</button>
            <a href="" class="batal">Batal</a>
        </form>
    </div>
@endsection

