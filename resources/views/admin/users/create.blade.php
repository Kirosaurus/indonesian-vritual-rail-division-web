@extends('layouts.admin')

@section('title', 'Dashboard Admin Create User')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/announcements/create.css') }}" />
@endsection

@section('content')

    <div class="main-page-admin">
        <div class="container">
            <div class="top-card">
                <h2>Create New User</h2>
            </div>
            <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>

                @if ($errors->any())
                    <div>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <div class="button-group">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-cancel">Cancel</a>
                    <button type="submit" class="btn btn-save">Save User</button>
                </div>
            </form>
        </div>
    </div>

@endsection