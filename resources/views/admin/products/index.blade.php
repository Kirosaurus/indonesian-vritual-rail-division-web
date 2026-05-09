@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<style>
    .container {
        display: flex;
        flex-direction: column;
        background-color: #fff;
        padding: 30px 40px;
        border-radius: 10px;
        width: 100%;
        height: 100%;
        /* max-width: 1738px; */
        max-height: 891px;
        overflow-y: auto;

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

    #pagination-section {
        display: flex;
        justify-content: center;
        height: auto;
        margin-top: auto;
        height: auto;
    }

    .pagination {
        display: flex;
        gap: 8px;
        list-style: none;
        padding: 0;
        margin: 12px 0 0;
        justify-content: center;
    }

    .page-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 34px;
        height: 34px;
        padding: 0 10px;
        border-radius: 8px;
        background: #f3f3f3;
        color: #333;
        text-decoration: none;
    }

    .page-item.active .page-link {
        background: #ff9b51;
        color: #fff;
    }

    .page-link svg {
        width: 14px;
        height: 14px;
    }

    #pagination-section .pagination .page-item:first-child,
    #pagination-section .pagination .page-item:last-child {
        display: none;
    }

    /* table tr:nth-child(even) {
        color: black    ;
        background-color: #f2f2f2;
    } */
</style>
<div class="main-page-admin">
    <div class="container">
        <div class="top-card">
            <h2 class="page-title">Product</h2>
            <a href="{{ route('admin.products.create')}}" class="btn-add">
                <button class="create-product">
                    <img src="{{ asset('plus_icon.svg') }}" alt="Icon Plus" style="width: 32px; height: 32px;">
                    Add Product
                </button>
            </a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Product ID</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>
                        <a href="">
                            View
                            {{$product->image}}
                        </a>
                    </td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->id}}</td>
                    <td>{{$product->price ? 'Rp '. $product->price : 'FREE'}}</td>
                    <td>{{$product->category->name ?? '-' }}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->active ? "Aktif" : "Tidak Aktif"}}</td>
                    <td>
                        <a href="" class="edit"><img src="{{ asset('edit_icon.svg') }}" alt="Icon Edit"
                                style="width: 30px; height: 30px; "></a>
                        <a href="" class="hapus"><img src="{{ asset('trash_icon.svg') }}" alt="Icon Trash"
                                style="width: 30px; height: 30px; "></a>
                    </td>
                </tr>
                @endforeach
                <!-- @for ($i = 0;$i< 10;$i++)
                <tr>
                    <td>database</td>
                    <td>database</td>
                    <td>database</td>
                    <td>database</td>
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
                @endfor -->
            </tbody>
        </table>
        <div id="pagination-section">
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
    </div>
    @endsection