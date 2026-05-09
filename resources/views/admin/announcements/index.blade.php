@extends('layouts.admin')

@section('title', 'Dashboard Admin Payware')

@section('content')
<style>
    .container {
        background-color: #fff;
        padding: 30px 40px;
        border-radius: 10px;
        width: 100%;
        height: 100%;
        /* max-width: 1738px; */
        max-height: 891px;

    }

    .top-card {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .top-card h2 {
        display: inline-block;
        margin-bottom: 6px;
        color: #FF9B51;
        font-size: 46px;
    }

    .top-card a {
        display: inline-block;
        margin-bottom: 6px;
        color: #fff;
        font-size: 24px;
        font-weight: 800;
    }

    .btn-add {
        display: flex;
        font-family: "Nexa";
    }

    .create-product {
        background-color: #FF9B51;
        color: white;
        border: none;
        font-family: "Nexa";
        font-weight: 800;
        font-size: 24px;
        display: flex;
        padding: 4px 21px;
        border-radius: 10px;
        align-content: center;
        align-items: center;
        justify-content: center;
        gap: 10px;
        cursor: pointer;
        transition: 0.1s ease-in-out;
    }

    .create-product:hover {
        scale: 1.05;
        box-shadow:
            0 0 5px #FF9B51,
            0 0 10px #FF9B51,
            0 0 15px #FF9B51;
    }

    table {
        overflow-x: auto;
        width: 100%;
        /* height: 736px; */
        border-collapse: collapse;
        margin-top: 20px;
        border-radius: 10px;
        /* border: 1px solid #ddd; */
        background-color: #9A9A9A;
        color: #fff;
    }

    table th,
    table td {
        padding: 12px 15px;
        border: 1px solid #ddd;
        text-align: center;
    }

    tr {
        width: 100px;
    }


    table th {
        font-size: 24px;
        font-weight: bold;
    }

    /* table tr:nth-child(even) {
        color: black    ;
        background-color: #f2f2f2;
    } */
</style>
<div class="main-page-admin">
    <div class="container">
        <div class="top-card">
            <h2 class="page-title">List Announcements</h2>
            <a href="{{ route('admin.products.create')}}" class="btn-add">
                <button class="create-product">
                    <img src="{{ asset('plus_icon.svg') }}" alt="Icon Plus" style="width: 32px; height: 32px;">
                    Add Announcement
                </button>
            </a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Announcement ID</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0;$i< 10;$i++)
                <tr>
                    <td>database</td>
                    <td>database</td>
                    <td>database</td>
                    <td>
                        <a href="" class="edit"><img src="{{ asset('edit_icon.svg') }}" alt="Icon Edit"
                                style="width: 30px; height: 30px; "></a>
                        <a href="" class="hapus"><img src="{{ asset('trash_icon.svg') }}" alt="Icon Trash"
                                style="width: 30px; height: 30px; "></a>
                    </td>
                </tr>
                @endfor
            </tbody>
        </table>
        
    </div>
    @endsection