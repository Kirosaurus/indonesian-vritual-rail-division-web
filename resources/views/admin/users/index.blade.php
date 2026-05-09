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
            color: #fff;
            margin-bottom: 6px;
            font-size: 24px;
            font-weight: 800;
            display: inline-block;
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
            background-color: #9A9A9A;
            color: #fff;
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border-radius: 10px;
        }

        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        table th,
        table td {
            padding: 12px 20px;
            text-align: center;
            border: 1px solid #ddd;
        }

        table th {
            font-size: 24px;
            font-weight: bold;
        }




        @media screen and (max-width: 768px) {
            .container {
                padding: 5px;
            }

            .table-responsive {
                overflow-x: auto;
            }

            table th,
            table td {
                white-space: nowrap;
                min-width: 120px;
                padding: 8px 12px;
            }

            .top-card {
                flex-direction: column;
                align-items: center;
                gap: 20px;
            }

            .top-card h2 {
                font-size: 32px;
                text-align: center;
            }

            .create-product {
                font-size: 20px;
                padding: 8px 16px;
            }
        }
    </style>
    <div class="main-page-admin">
        <div class="container">
            <div class="top-card">
                <h2 class="page-title">List
                    Users</h2>
                <a href="{{ route('admin.users.create')}}" class="btn-add">
                    <button class="create-product">
                        <img src="{{ asset('plus_icon.svg') }}" alt="Icon Plus" style="width: 32px; height: 32px;">
                        Add User
                    </button>
                </a>
            </div>

            <div class="table-responsive">
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

        </div>
@endsection