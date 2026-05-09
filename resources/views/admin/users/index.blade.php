@extends('layouts.admin')

@section('title', 'Dashboard Admin User')

@section('content')
    <style>
        .container {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            width: 100%;
            height: 100%;
            max-height: 891px;
        }
        .top-card{
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .top-card h2{
            display: inline-block;
            margin-bottom: 6px;
            color: #FF9B51;
            font-size: 46px;
        }

        .top-card a{
            color: #fff;
            margin-bottom: 6px;
            font-size: 24px;
            font-weight: 800;   
            display: inline-block;
        }

        .btn-add{
            display: flex;
            font-family: "Nexa";
        }

        .create-product{
            background-color: #FF9B51;
            color: white;
            
        }

    </style>
    <div class="main-page-admin">
        <div class="container">
            <div class="top-card">
                <h2 class="page-title">List
                    Users</h2>
                <a href="{{ route('admin.products.create')}}" class="btn-add">
                    <button class="create-product">
                        <img src="{{ asset('plus_icon.svg') }}" alt="Icon Plus" style="width: 32px; height: 32px;">
                        Add User
                    </button>
                </a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 10; $i++)
                        <tr>
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