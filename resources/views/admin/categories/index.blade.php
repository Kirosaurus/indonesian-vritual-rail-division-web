@extends('layouts.admin')

@section('title', 'Dashboard Admin Category')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/announcements/index.css') }}" />
@endsection

@section('content')

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
                            <a href="{{route('admin.categories.edit', $category->id)}}" class="edit"><img src="{{ asset('icons/edit_icon.svg') }}" alt="Icon Edit"
                                    style="width: 30px; height: 30px; "></a>
                            <button class="hapus-btn" data-category-id="{{ $category->id }}" data-category-name="{{ $category->name }}" style="background: none; border: none; cursor: pointer; padding: 0;">
                                <img src="{{ asset('icons/trash_icon.svg') }}" alt="Icon Trash" style="width: 30px; height: 30px;">
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