@extends('layouts.admin')

@section('title', 'Dashboard Admin Announcements')

@section('content')
<style>
    .container {
        container-type: inline-size;
        container-name: main-container;
        display: flex;
        flex-direction: column;
        background-color: #fff;
        padding: 30px 40px;
        border-radius: 10px;
        width: 100%;
        height: 100%;
        /* max-width: 1738px; */
        max-height: 891px;
        overflow-y: hidden;

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

    .announcement-img-container {
        display: flex;
        justify-content: center;
    }

    .announcement-img-wrapper {
        width: auto;
        height: 150px;
        aspect-ratio: 16/9;
    }

    .announcement-img {
        width: 100%;
        height: auto;
        display: block;
        object-fit: cover;
    }

    .table-wrapper {
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        margin-top: 20px;
        border-radius: 10px;
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

    table {
        width: 100%;
        min-width: 800px;
        border-collapse: collapse;
        border-radius: 10px;
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

    @container main-container (max-width : 750px) {
        .top-card {
            flex-direction: column;
        }

        .top-card h2 {
            font-size: 32px;
            text-align: center;
        }
    }
</style>
<div class="main-page-admin">
    <div class="container">
        <div class="top-card">
            <h2 class="page-title">List Announcements</h2>
            <a href="{{ route('admin.announcements.create')}}" class="btn-add">
                <button class="create-product">
                    <img src="{{ asset('plus_icon.svg') }}" alt="Icon Plus" style="width: 32px; height: 32px;">
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
                                    <img
                                        class="announcement-img"
                                        src=" {{ asset('storage/'. $announcement->image)}}">
                                </div>
                            </div>
                        </td>
                        <td> {{ $announcement->id }}</td>
                        <td> {{ $announcement->active ? "Aktif" : "Tidak Aktif  " }}</td>
                        <td>
                            <a href="{{ route('admin.announcements.edit', $announcement->id)}}" class="edit"><img src="{{ asset('edit_icon.svg') }}" alt="Icon Edit"
                                    style="width: 30px; height: 30px; "></a>
                            <button class="hapus-btn" data-product-id="{{ $announcement->id }}" data-product-name="{{ $announcement->name }}" style="background: none; border: none; cursor: pointer; padding: 0;">
                                <img src="{{ asset('trash_icon.svg') }}" alt="Icon Trash"
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
                btn.addEventListener('click', function(event) {
                    event.preventDefault();
                    currentAnnouncementId = this.dataset.productId; // Sesuai dengan data attribute yang ada

                    // Ubah text modal untuk announcement
                    deleteConfirmationText.innerHTML = 'Apakah anda yakin ingin menghapus announcement?';

                    deleteModal.classList.add('active');
                });
            });

            // Tutup modal ketika klik "Tidak"
            btnDeleteCancel.addEventListener('click', function() {
                deleteModal.classList.remove('active');
                currentAnnouncementId = null;
            });

            // Hapus announcement ketika klik "Ya"
            btnDeleteConfirm.addEventListener('click', function() {
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