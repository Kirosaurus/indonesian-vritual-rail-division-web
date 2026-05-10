@extends('layouts.admin')

@section('title', 'Dashboard Admin Category')

@section('content')
<style>
    .container {
        container-type: inline-size;
        container-name: main-container;
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
        justify-content: center;
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

    .table-wrapper {
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        margin-top: 20px;
        border-radius: 10px;
    }

    table {
        width: 100%;
        min-width: 600px;
        background-color: #9A9A9A;
        color: #fff;
        border-collapse: collapse;
        border-radius: 10px;
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

    @container main-container (max-width : 750px) {
        .top-card {
            flex-direction: column;
        }

        .top-card h2 {
            font-size: 32px;
            text-align: center;
        }
    }

    /* Delete Confirmation Modal */
    .delete-confirmation-modal {
        display: none;
        position: fixed;
        inset: 0;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 2000;
        align-items: center;
        justify-content: center;
        animation: fadeIn 0.3s ease;
    }

    .delete-confirmation-modal.active {
        display: flex;
        animation: fadeIn 0.3s ease;
    }

    .delete-confirmation-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 40px;
        max-width: 500px;
        width: 90%;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.25);
        animation: slideUp 0.3s ease;
    }

    .delete-confirmation-card h3 {
        margin: 0 0 20px 0;
        font-size: 24px;
        font-weight: 800;
        color: #25343f;
        font-family: "Nexa", sans-serif;
    }

    .delete-confirmation-card p {
        margin: 0 0 30px 0;
        font-size: 16px;
        color: #666;
        font-family: "Nexa", sans-serif;
        line-height: 1.5;
    }

    .delete-confirmation-actions {
        display: flex;
        gap: 15px;
        justify-content: flex-end;
    }

    .btn-delete-cancel {
        padding: 12px 30px;
        border: none;
        border-radius: 10px;
        font-family: "Nexa", sans-serif;
        font-weight: 800;
        font-size: 16px;
        cursor: pointer;
        background-color: #4CAF50;
        color: white;
        transition: all 0.2s ease;
    }

    .btn-delete-cancel:hover {
        background-color: #45a049;
        transform: scale(1.05);
    }

    .btn-delete-confirm {
        padding: 12px 30px;
        border: none;
        border-radius: 10px;
        font-family: "Nexa", sans-serif;
        font-weight: 800;
        font-size: 16px;
        cursor: pointer;
        background-color: #f44336;
        color: white;
        transition: all 0.2s ease;
    }

    .btn-delete-confirm:hover {
        background-color: #da190b;
        transform: scale(1.05);
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes slideUp {
        from {
            transform: translateY(50px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
</style>
<div class="main-page-admin">
    <div class="container">
        <div class="top-card">
            <h2 class="page-title">List
                Categories
            </h2>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Category ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>
                            <a href="{{route('admin.categories.edit', $category->id)}}" class="edit"><img src="{{ asset('edit_icon.svg') }}" alt="Icon Edit"
                                    style="width: 30px; height: 30px; "></a>
                            <button class="hapus-btn" data-category-id="{{ $category->id }}" data-category-name="{{ $category->name }}" style="background: none; border: none; cursor: pointer; padding: 0;">
                                <img src="{{ asset('trash_icon.svg') }}" alt="Icon Trash" style="width: 30px; height: 30px;">
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div id="deleteConfirmationModal" class="delete-confirmation-modal">
        <div class="delete-confirmation-card">
            <h3>Konfirmasi Penghapusan</h3>
            <p id="deleteConfirmationText">Apakah anda yakin ingin menghapus annoncement?</p>
            <div class="delete-confirmation-actions">
                <button class="btn-delete-cancel" id="btnDeleteCancel">Tidak</button>
                <button class="btn-delete-confirm" id="btnDeleteConfirm">Ya</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const deleteModal = document.getElementById('deleteConfirmationModal');
            const btnDeleteCancel = document.getElementById('btnDeleteCancel');
            const btnDeleteConfirm = document.getElementById('btnDeleteConfirm');
            const deleteConfirmationText = document.getElementById('deleteConfirmationText');
            const deleteButtons = document.querySelectorAll('.hapus-btn');

            let currentCategoryId = null;
            let currentCategoryName = null;

            // Buka modal konfirmasi delete
            deleteButtons.forEach(btn => {
                btn.addEventListener('click', function(event) {
                    event.preventDefault();
                    currentCategoryId = this.dataset.categoryId;
                    currentCategoryName = this.dataset.categoryName;

                    deleteConfirmationText.innerHTML = `Apakah anda yakin ingin menghapus kategori <strong>${currentCategoryName}</strong>?`;
                    deleteModal.classList.add('active');
                });
            });

            // Tutup modal ketika klik "Tidak"
            btnDeleteCancel.addEventListener('click', function() {
                deleteModal.classList.remove('active');
                currentCategoryId = null;
            });

            // Hapus kategori ketika klik "Ya"
            btnDeleteConfirm.addEventListener('click', function() {
                if (currentCategoryId) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `/admin/categories/${currentCategoryId}`;

                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    const csrfInput = document.createElement('input');
                    csrfInput.type = 'hidden';
                    csrfInput.name = '_token';
                    csrfInput.value = csrfToken;

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