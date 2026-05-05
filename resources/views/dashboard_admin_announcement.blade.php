@extends('layouts.admin')

@section('title', 'Dashboard Admin Announcement')

@section('content')
    <style>
        .main-page-admin {
            font-family: "Nexa";
            display: flex;
            flex-direction: column;
            gap: 18px;
            flex: 1;
            padding: 41px 90px;
            z-index: 1;
            height: 100vh;
            overflow-y: hidden;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        .admin-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 28px;
            width: 100%;
        }

        .back-btn {
            display: inline-block;
            padding: 6px 31px;
            border-radius: 999px;
            color: #000000;
            background-color: #fff;
            text-decoration: none;
            font-weight: 800;
            font-size: 30px;
            font-family: "Nexa";
        }


        .search-card {
            width: 100%;
            border-radius: 28px;
            background: #ffffff;
            display: flex;
            align-items: center;
            gap: 50px;
            padding: 18px 24px;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.16);
        }

        .search-card .search-icon {
            width: 50px;
            height: 50px;
            border-radius: 18px;
            background: #ff9b51;
            display: grid;
            place-items: center;
            color: #ffffff;
            font-size: 22px;
        }

        .search-card .search-title {
            font-size: 18px;
            font-weight: 700;
            color: #25343f;
            letter-spacing: -0.02em;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 16px;
            justify-content: flex-end;
            min-width: 260px;
        }

        .profile-card {
            display: flex;
            align-items: center;
            gap: 14px;
            border-radius: 24px;
            padding: 14px 16px;
            background: rgba(255, 255, 255, 0.16);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            color: #ffffff;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.16);
        }

        .profile-avatar {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background-color: #ffffff;
            display: grid;
            place-items: center;
            color: #25343f;
            font-weight: 700;
            font-size: 18px;
            box-shadow: inset 0 0 0 1px rgba(0, 0, 0, 0.04);
        }

        .profile-info .name {
            font-size: 16px;
            font-weight: 700;
            color: #ffffff;
        }

        .container {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            width: 100%;
            height: 100%;
            max-width: 1738px;
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

        .create-product {
            background-color: #FF9B51;
            display: flex;
            padding: 4px 21px;
            border-radius: 10px;
            align-content: center;
            justify-content: flex-start;
            gap: 10px;
            box-shadow:
                0 0 5px #FF9B51,
                0 0 10px #FF9B51,
                0 0 15px #FF9B51;
        }

        table {
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

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
    <div class="main-page-admin">
        <div class="admin-header">
            <a href="/" class="back-btn">Back to Site</a>
            <div class="header-center">
                <div class="search-card">
                    <a href="/admin/payware"><img src="{{ asset('paywareBlack_icon.svg') }}" alt="Payware" style="width: 40px; height: 40px;"></a>
                    <a href="/admin/freeware"><img src="{{ asset('freewareBlack_icon.svg') }}" alt="Freeware" style="width: 40px; height: 40px;"></a>
                    <a href="/admin/announcement"><img src="{{ asset('announcBlack_icon.svg') }}" alt="Announcement" style="width: 35px; height: 35px;"></a>

                </div>
            </div>
            <div class="header-right">
                <div class="profile-card">
                    <div class="profile-avatar"><img src="{{ asset('person_icon.svg') }}" alt="Announcement"
                            style="width: 24px; height: 25px;"></div>
                    <div class="profile-info">
                        <div class="name">{{ auth()->user()->name ?? 'Admin' }}</div>
                        <div class="email">{{ auth()->user()->email ?? 'example@email.com' }}</div>
                    </div>
                </div>
            </div>
        </div> 

        <div class="container">
            <div class="top-card">
                <h2 class="page-title">Product Announcement</h2>
                <div class="create-product">
                    <img src="{{ asset('plus_icon.svg') }}" alt="Icon Plus" style="width: 32px; height: 32px;">
                    <a href="/admin/create" class="btn-add"> Add Product</a>
                </div>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product ID</th>
                        <th>Status</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>
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
                </tbody>
            </table>
        </div>
@endsection