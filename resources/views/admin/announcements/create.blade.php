@extends('layouts.admin')

@section('title', 'Dashboard Admin Create Announcement  ')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/announcements/create.css') }}" />
@endsection

@section('content')

    <div class="main-page-admin">
        <div class="container">
            <div class="top-card">
                <h2>Create New Announcement</h2>
            </div>

            <form action="{{ route('admin.announcements.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="image">Product Image</label>
                    <input type="file" id="image" name="image" accept="image/">
                </div>

                <div class="form-group">
                    <label for="active">Active</label>
                    <select id="active" name="active">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
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
                    <button type="submit" class="btn btn-save">Save Announcement</button>
                </div>
            </form>
        </div>
    </div>
@endsection