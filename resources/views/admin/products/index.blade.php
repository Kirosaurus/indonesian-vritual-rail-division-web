@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/products/index.css') }}" />
@endsection

@section('content')
    
    <div class="main-page-admin">
        <div id="product-view-popup" class="product-view-popup">
            <div class="product-view-card">
                <div class="product-view-header">
                    <h2 class="product-view-title">Product Images</h2>
                    <button type="button" id="close-view-popup" class="product-view-close">×</button>
                </div>
                <div class="product-view-main">
                    <div id="main-image" class="product-view-image">
                        <img>
                        {{-- Tempat menyimpan gambar utama --}}
                    </div>
                    <div id="list-images" class="product-view-thumbs">
                        <div class="product-view-thumb">

                        </div>

                    </div>
                </div>
            </div>
            <div class="popup-overlay" id="view-popup-overlay"></div>
        </div>

        <div class="container">
            <div class="top-card">
                <h2 class="page-title">List Products</h2>
                <a href="{{ route('admin.products.create') }}" class="btn-add">
                    <button class="create-product">
                        <img src="{{ asset('icons/plus_icon.svg') }}" alt="Icon Plus" style="width: 32px; height: 32px;">
                        Add Product
                    </button>
                </a>
            </div>

            <div class="table-wrapper">
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
                            @php
                                $imagePaths = $product->images
                                    ->pluck('path')
                                    ->map(fn($path) => asset('storage/' . $path))
                                    ->toArray();
                                $imageSrc = count($imagePaths) > 0 ? $imagePaths[0] : asset('unknownThumbnail.png');
                            @endphp
                            <tr>
                                <td>
                                    <a href="#" class="product-view-link" data-name="{{ $product->name }}"
                                        data-img="{{ json_encode($imagePaths) }}">View</a>
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->price ? 'Rp ' . $product->price : 'FREE' }}</td>
                                <td>{{ $product->category->name ?? '-' }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->active ? 'Aktif' : 'Tidak Aktif' }}</td>
                                <td>
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="edit"><img
                                            src="{{ asset('icons/edit_icon.svg') }}" alt="Icon Edit"
                                            style="width: 30px; height: 30px; "></a>
                                    <button class="hapus-btn" data-product-id="{{ $product->id }}"
                                        data-product-name="{{ $product->name }}"
                                        style="background: none; border: none; cursor: pointer; padding: 0;">
                                        <img src="{{ asset('icons/trash_icon.svg') }}" alt="Icon Trash"
                                            style="width: 30px; height: 30px; ">
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div id="pagination-section">
                {{ $products->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteConfirmationModal" class="delete-confirmation-modal">
        <div class="delete-confirmation-card">
            <h3>Konfirmasi Penghapusan</h3>
            <p id="deleteConfirmationText">Apakah anda yakin ingin menghapus product <strong
                    id="productNameDisplay"></strong>?</p>
            <div class="delete-confirmation-actions">
                <button class="btn-delete-cancel" id="btnDeleteCancel">Tidak</button>
                <button class="btn-delete-confirm" id="btnDeleteConfirm">Ya</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // View Popup Logic
            const viewLinks = document.querySelectorAll('.product-view-link');
            const viewPopup = document.getElementById('product-view-popup');
            const closeViewBtn = document.getElementById('close-view-popup');
            const viewOverlay = document.getElementById('view-popup-overlay');
            const popupTitle = document.querySelector('.product-view-title');

            function openViewPopup(name, images) {
                popupTitle.textContent = name ? `${name}` : 'Product Images';
                const mainImage = document.querySelector("#main-image img");
                mainImage.src = images.length > 0 ? images[0] : 'storage/image-products/unknownThumbnail.png';

                const listImages = document.querySelector('#list-images');

                listImages.innerHTML = images.map((img, index) => `
                <div class="product-view-thumb">
                    <img  src="${img}" alt="Product image" data-index="${index}" />
                </div>
                `).join('');

                listImages.querySelectorAll('img').forEach(thumb => {
                    thumb.addEventListener('click', function() {
                        mainImage.src = this.src;
                        listImages.querySelectorAll('img').forEach(t => t.style.opacity = '0.6');
                        this.style.opacity = '1';
                    });
                });

                viewPopup.classList.add('visible');
            }

            function closeViewPopup() {
                viewPopup.classList.remove('visible');
            }

            viewLinks.forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    const imageParse = JSON.parse(this.dataset.img || [])
                    openViewPopup(this.dataset.name, imageParse);
                });
            });

            closeViewBtn.addEventListener('click', closeViewPopup);
            viewOverlay.addEventListener('click', closeViewPopup);

            // Delete Button Logic
            const deleteModal = document.getElementById('deleteConfirmationModal');
            const btnDeleteCancel = document.getElementById('btnDeleteCancel');
            const btnDeleteConfirm = document.getElementById('btnDeleteConfirm');
            const deleteConfirmationText = document.getElementById('deleteConfirmationText');
            const productNameDisplay = document.getElementById('productNameDisplay');
            const deleteButtons = document.querySelectorAll('.hapus-btn');

            let currentProductId = null;

            // Buka modal konfirmasi delete
            deleteButtons.forEach(btn => {
                btn.addEventListener('click', function(event) {
                    event.preventDefault();
                    currentProductId = this.dataset.productId;
                    const productName = this.dataset.productName;

                    productNameDisplay.textContent = productName;
                    deleteModal.classList.add('active');
                });
            });

            // Tutup modal ketika klik "Tidak"
            btnDeleteCancel.addEventListener('click', function() {
                deleteModal.classList.remove('active');
                currentProductId = null;
            });

            // Hapus produk ketika klik "Ya"
            btnDeleteConfirm.addEventListener('click', function() {
                if (currentProductId) {
                    // Buat form dan submit ke route destroy
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `/admin/products/${currentProductId}`;

                    // Tambah CSRF token
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content');
                    const csrfInput = document.createElement('input');
                    csrfInput.type = 'hidden';
                    csrfInput.name = '_token';
                    csrfInput.value = csrfToken;

                    // Tambah method DELETE
                    const methodInput = document.createElement('input');
                    methodInput.type = 'hidden';
                    methodInput.name = '_method';
                    methodInput.value = 'DELETE';

                    form.appendChild(csrfInput);
                    form.appendChild(methodInput);
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        });
    </script>
@endsection
