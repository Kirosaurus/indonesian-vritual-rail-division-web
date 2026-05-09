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


        .product-view-popup {
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            inset: 0;
            z-index: 1000;
            transition: opacity 0.3s ease, transform 0.3s ease;
            opacity: 0;
            pointer-events: none;
        }

        .product-view-popup.visible {
            opacity: 1;
            pointer-events: auto;
        }

        .product-view-card {
            width: min(100%, 920px);
            background-color: #ffffff;
            border-radius: 28px;
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.18);
            padding: 32px;
            position: relative;
            transform: translateY(20px);
        }

        .product-view-popup.visible .product-view-card {
            transform: translateY(0);
        }

        .product-view-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 24px;
        }

        .product-view-title {
            margin: 0;
            font-size: 30px;
            font-weight: 800;
            color: #0d171f;
        }

        .product-view-close {
            border: none;
            background: transparent;
            font-size: 32px;
            color: #555;
            cursor: pointer;
            line-height: 1;
        }

        .product-view-main {
            display: grid;
            grid-template-columns: 1.4fr 1fr;
            gap: 24px;
        }

        .product-view-image {
            min-height: 380px;
            border-radius: 24px;
            background: #f4f4f4;
            border: 2px dashed #d4d4d4;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #777;
            font-weight: 700;
            font-size: 18px;
            text-align: center;
            padding: 24px;
        }

        .product-view-thumbs {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }

        .product-view-thumb {
            min-height: 120px;
            border-radius: 18px;
            background: #f8f8f8;
            border: 1px dashed #d7d7d7;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
            font-weight: 700;
            font-size: 14px;
            padding: 14px;
            text-align: center;
        }

        @media screen and (max-width: 880px) {
            .product-view-main {
                grid-template-columns: 1fr;
            }
        }

        @media screen and (max-width: 620px) {
            .product-view-card {
                padding: 22px;
            }
            .product-view-thumbs {
                grid-template-columns: 1fr;
            }
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
        <div id="product-view-popup" class="product-view-popup">
            <div class="product-view-card">
                <div class="product-view-header">
                    <h2 class="product-view-title">Product Images</h2>
                    <button type="button" id="close-view-popup" class="product-view-close">×</button>
                </div>
                <div class="product-view-main">
                    <div class="product-view-image">
                        Tempat menyimpan gambar utama
                    </div>
                    <div class="product-view-thumbs">
                        <div class="product-view-thumb">Placeholder 1</div>
                        <div class="product-view-thumb">Placeholder 2</div>
                        <div class="product-view-thumb">Placeholder 3</div>
                        <div class="product-view-thumb">Placeholder 4</div>
                    </div>
                </div>
            </div>
            <div class="popup-overlay" id="view-popup-overlay"></div>
        </div>

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
                                <a href="#" class="product-view-link" data-name="{{ $product->name }}">View</a>
                            </td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->id}}</td>
                            <td>{{$product->price ? 'Rp ' . $product->price : 'FREE'}}</td>
                            <td>{{$product->category->name ?? '-' }}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->active ? "Aktif" : "Tidak Aktif"}}</td>
                            <td>
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="edit"><img
                                        src="{{ asset('edit_icon.svg') }}" alt="Icon Edit"
                                        style="width: 30px; height: 30px; "></a>
                                <a href="#" class="hapus"><img src="{{ asset('trash_icon.svg') }}" alt="Icon Trash"
                                        style="width: 30px; height: 30px; "></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div id="pagination-section">
                {{ $products->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const viewLinks = document.querySelectorAll('.product-view-link');
            const viewPopup = document.getElementById('product-view-popup');
            const closeViewBtn = document.getElementById('close-view-popup');
            const viewOverlay = document.getElementById('view-popup-overlay');
            const popupTitle = document.querySelector('.product-view-title');

            function openViewPopup(name) {
                popupTitle.textContent = name ? `${name} - Image Template` : 'Product Images';
                viewPopup.classList.add('visible');
            }

            function closeViewPopup() {
                viewPopup.classList.remove('visible');
            }

            viewLinks.forEach(link => {
                link.addEventListener('click', function (event) {
                    event.preventDefault();
                    openViewPopup(this.dataset.name);
                });
            });

            closeViewBtn.addEventListener('click', closeViewPopup);
            viewOverlay.addEventListener('click', closeViewPopup);
        });
    </script>
@endsection