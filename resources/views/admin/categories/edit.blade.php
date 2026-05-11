@extends('layouts.admin')

@section('title', 'Dashboard Admin Edit User')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/announcements/edit.css') }}" />
@endsection

@section('content')

    <div class="main-page-admin">
        <div class="container">
            <div class="top-card">
                <h2>Edit Category</h2>
            </div>
            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" id="name" name="name" value="{{$category->name}}">
                </div>
                @if ($errors->any())
                    <div>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <div class="button-group">
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-cancel">Cancel</a>
                    <button type="submit" class="btn btn-save">Edit User</button>
                </div>
            </form>
        </div>
    </div>

    <script>
    </script>
@endsection