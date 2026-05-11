@extends('layouts.admin')

@section('title', 'Dashboard Admin User')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/announcements/index.css') }}" />
@endsection

@section('content')

<div class="main-page-admin">
    <div class="container">
        <div class="top-card">
            <h2 class="page-title">List
                Users</h2>
            <a href="{{ route('admin.users.create')}}" class="btn-add">
                <button class="create-product">
                    <img src="{{ asset('icons/plus_icon.svg') }}" alt="Icon Plus" style="width: 32px; height: 32px;">
                    Add User
                </button>
            </a>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <a href="{{route('admin.users.edit', $user->id)}}" class="edit"><img src="{{ asset('icons/edit_icon.svg') }}" alt="Icon Edit"
                                    style="width: 30px; height: 30px; "></a>
                            <button class="hapus-btn" data-user-id="{{ $user->id }}" data-user-name="{{ $user->name }}" style="background: none; border: none; cursor: pointer; padding: 0;">
                                <img src="{{ asset('icons/trash_icon.svg') }}" alt="Icon Trash" style="width: 30px; height: 30px;">
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div id="pagination-section">
            {{ $users->links('pagination::bootstrap-5') }}
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
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const deleteModal = document.getElementById('deleteConfirmationModal');
            const btnDeleteCancel = document.getElementById('btnDeleteCancel');
            const btnDeleteConfirm = document.getElementById('btnDeleteConfirm');
            const deleteConfirmationText = document.getElementById('deleteConfirmationText');
            const deleteButtons = document.querySelectorAll('.hapus-btn');

            let currentUserId = null;
            let currentUserName = null;

            // Buka modal konfirmasi delete
            deleteButtons.forEach(btn => {
                btn.addEventListener('click', function(event) {
                    event.preventDefault();
                    currentUserId = this.dataset.userId;
                    currentUserName = this.dataset.userName;

                    deleteConfirmationText.innerHTML = `Apakah anda yakin ingin menghapus user <strong>${currentUserName}</strong>?`;
                    deleteModal.classList.add('active');
                });
            });

            // Tutup modal ketika klik "Tidak"
            btnDeleteCancel.addEventListener('click', function() {
                deleteModal.classList.remove('active');
                currentUserId = null;
            });

            // Hapus user ketika klik "Ya"
            btnDeleteConfirm.addEventListener('click', function() {
                if (currentUserId) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `/admin/users/${currentUserId}`;

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