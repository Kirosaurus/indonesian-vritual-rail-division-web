@extends('layouts.admin')

@section('title', 'Dashboard Admin Announcements')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/announcements/index.css') }}" />
@endsection

@section('content')

    <div class="main-page-admin">
        <div class="container">
            <div class="top-card">
                <h2 class="page-title">List Announcements</h2>
                <a href="{{ route('admin.announcements.create')}}" class="btn-add">
                    <button class="create-product">
                        <img src="{{ asset('icons/plus_icon.svg') }}" alt="Icon Plus" style="width: 32px; height: 32px;">
                        Add Announcement
                    </button>
                </a>
            </div>

            <div class="table-wrapper">
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
                        @foreach($announcements as $announcement)
                            <tr>
                                <td>
                                    <div class="announcement-img-container">
                                        <div class="announcement-img-wrapper">
                                            <img class="announcement-img" src=" {{ asset('storage/' . $announcement->image)}}">
                                        </div>
                                    </div>
                                </td>
                                <td> {{ $announcement->id }}</td>
                                <td> {{ $announcement->active ? "Aktif" : "Tidak Aktif  " }}</td>
                                <td>
                                    <a href="{{ route('admin.announcements.edit', $announcement->id)}}" class="edit"><img
                                            src="{{ asset('icons/edit_icon.svg') }}" alt="Icon Edit"
                                            style="width: 30px; height: 30px; "></a>
                                    <button class="hapus-btn" data-product-id="{{ $announcement->id }}"
                                        data-product-name="{{ $announcement->name }}"
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
                {{ $announcements->links('pagination::bootstrap-5') }}
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
                const productNameDisplay = document.getElementById('productNameDisplay');
                const deleteButtons = document.querySelectorAll('.hapus-btn');

                let currentAnnouncementId = null;

                // Buka modal konfirmasi delete
                deleteButtons.forEach(btn => {
                    btn.addEventListener('click', function (event) {
                        event.preventDefault();
                        currentAnnouncementId = this.dataset.productId; // Sesuai dengan data attribute yang ada

                        // Ubah text modal untuk announcement
                        deleteConfirmationText.innerHTML = 'Apakah anda yakin ingin menghapus announcement?';

                        deleteModal.classList.add('active');
                    });
                });

                // Tutup modal ketika klik "Tidak"
                btnDeleteCancel.addEventListener('click', function () {
                    deleteModal.classList.remove('active');
                    currentAnnouncementId = null;
                });

                // Hapus announcement ketika klik "Ya"
                btnDeleteConfirm.addEventListener('click', function () {
                    if (currentAnnouncementId) {
                        // Buat form dan submit ke route destroy
                        const form = document.createElement('form');
                        form.method = 'POST';
                        form.action = `/admin/announcements/${currentAnnouncementId}`;

                        // Tambah CSRF token
                        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
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