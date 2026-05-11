@extends('layouts.admin')

@section('title', 'Dashboard Admin Edit Announcement')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/announcements/edit.css') }}" />
@endsection

@section('content')

    <div class="main-page-admin">
        <div class="container">
            <div class="top-card">
                <h2>Edit Announcement</h2>
            </div>

            <form id="announcementForm" action="{{ route('admin.announcements.update', $announcement->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @if($announcement->image)
                    <div id="image-preview-container" style="margin-bottom: 10px; display: flex; flex-wrap: wrap; gap: 10px;">
                        <div class="image-thumb-wrapper" data-image-id="{{ $announcement->image }}">
                            <img src="{{ asset('storage/' . $announcement->image) }}" alt="Current Image">
                        </div>
                    </div>
                @endif
                <div class="form-group">
                    <label for="image">Product Image</label>
                    <input type="file" id="image" name="image" accept="image">
                </div>

                <div class="form-group">
                    <label for="active">Active</label>
                    <select id="active" name="active">
                        <option value="1" {{$announcement->active === 1 ? 'selected' : ''}}>Yes</option>
                        <option value="0" {{$announcement->active === 0 ? 'selected' : ''}}>No</option>
                    </select>
                </div>
                @if ($errors->any())
                    <div>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <div class="button-group">
                    <a href="{{ route('admin.announcements.index') }}" class="btn btn-cancel">Cancel</a>
                    <button type="submit" class="btn btn-save">Edit Announcement</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Handle image update confirmation
        const announcementForm = document.getElementById('announcementForm');
        const imageInput = document.getElementById('image');

        announcementForm.addEventListener('submit', function (e) {
            e.preventDefault();

            // Check jika ada file baru dan ada gambar lama
            const hasNewFile = imageInput.files.length > 0;
            const hasOldImage = document.querySelector('[data-image-id]') !== null;

            if (hasNewFile && hasOldImage) {
                // Show confirmation
                const confirmed = confirm('Apakah anda ingin mengganti gambar yang lama menjadi yang baru?');
                if (!confirmed) {
                    return;
                }
            }

            // Submit form
            this.submit();
        });
    </script>
@endsection