@extends('layouts.admin')

@section('title', 'Dashboard Admin Edit Product')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/products/edit.css') }}" />
@endsection

@section('content')

    <div class="main-page-admin">
        <div id="popup-category" class="popup-category hidden">
            <div id="popup-container">
                <div class="top-card">
                    <h2>Create New Category</h2>
                </div>
                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" id="newCategory" name="newCategory" required>
                    </div>

                    <div class="button-group">
                        <button type="button" id="cancel-popup" class="btn btn-cancel">Cancel</button>
                        <button type="submit" class="btn btn-save">Save Category</button>
                    </div>
                </form>
                <div class="popup-overlay"></div>
            </div>
        </div>
        <div class="container">
            <div class="top-card">
                <h2>Edit Product '{{ $product->name}}'</h2>
            </div>



            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" id="name" name="name" value="{{$product->name}}" required>
                </div>

                <div class="form-group">
                    <label for="image">Product Image</label>
                    @if($product->images->count() > 0)
                        <div id="image-preview-container"
                            style="margin-bottom: 10px; display: flex; flex-wrap: wrap; gap: 10px;">
                            @foreach($product->images as $image)
                                <div class="image-thumb-wrapper" data-image-id="{{ $image->id }}">
                                    <img src="{{ asset('storage/' . $image->path) }}" alt="Current Image">
                                    <button type="button" class="delete-image-btn"
                                        onclick="removeImage({{ $image->id }})">✕</button>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <div id="deleted-image-inputs"></div>
                    <input type="file" id="images" name="image[]" accept="image/*" multiple>
                </div>

                <div class="form-group">
                    <label for="type">Type</label>
                    <select id="type" name="type" required>
                        <option value="">Select a Type</option>
                        <option value="payware" {{ $product->type === 'payware' ? 'selected' : '' }}>Payware</option>
                        <option value="freeware" {{ $product->type === 'freeware' ? 'selected' : '' }}>Freeware</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" required>{{$product->description}}</textarea>
                </div>

                <div class="form-group">
                    <label for="price">Price (IDR)</label>
                    <input type="number" id="price" name="price" step="0.01" min="0" value="{{$product->price}}" required>
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <div class="row-input">
                        <select id="category" name="category" required>
                            <option value="">Select a Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id === $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <div id="add-category-btn">
                            <img src="{{ asset('plusBlack_icon.svg') }}" alt="Icon Plus" style="width: 20px; height: 20px;">
                        </div>
                    </div>
                </div>
                @php
                    $tags = $product->tags->pluck('name');
                    $tagValue = '';
                    foreach ($tags as $tag)
                        $tagValue = $tagValue . $tag . ',';
                @endphp
                <div class="form-group">
                    <label for="tags">Tags (pisahkan dengan koma)</label>
                    <textarea id="tags" name="tags"
                        placeholder="Android Version, Android Only, All Support,...">{{ $tagValue }}</textarea>
                </div>

                <div class="form-group">
                    <label for="active">Active</label>
                    <select id="active" name="active">
                        <option value="1" {{$product->active === 1 ? 'selected' : ''}}>Yes</option>
                        <option value="0" {{$product->active === 0 ? 'selected' : ''}}>No</option>
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
                    <a href="{{ route('admin.products.index') }}" class="btn btn-cancel">Cancel</a>
                    <button type="submit" class="btn btn-save">Edit Product</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const type = document.getElementById("type");
            const price = document.getElementById("price");

            const priceState = () => {
                const isFreeware = type.value === 'freeware';
                price.disabled = isFreeware;
                if (isFreeware) {
                    price.value = 0;
                    price.removeAttribute('required');
                } else {
                    price.disabled = 0;
                    if (!price.value) {
                        price.setAttribute('required', 'required');
                    }
                }

            }
            type.addEventListener('change', priceState);
            priceState();
        })

        const popupAddCategory = document.getElementById("popup-category");
        const addCategoryBtn = document.getElementById("add-category-btn");
        const cancelPopupBtn = document.getElementById("cancel-popup");
        const categoryForm = document.querySelector('#popup-category form');
        const categorySelect = document.getElementById('category');

        addCategoryBtn.addEventListener("click", () => {
            popupAddCategory.classList.remove("hidden");
        })

        cancelPopupBtn.addEventListener("click", () => {
            popupAddCategory.classList.add("hidden");
        });

        categoryForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const formData = new FormData(categoryForm);

            const res = await fetch(categoryForm.action, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: formData
            });

            const data = await res.json();

            const option = new Option(data.name, data.id, true, true);
            categorySelect.add(option);

            categoryForm.reset();
            popupAddCategory.classList.add("hidden");
        });

        const removeImage = (imageID) => {
            if (confirm('Yakin ingin menghapus image ini?')) {
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                
                fetch(`/admin/images/${imageID}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Content-Type': 'application/json',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Hapus elemen dari DOM
                        const imageWrapper = document.querySelector(`[data-image-id="${imageID}"]`);
                        if (imageWrapper) {
                            imageWrapper.remove();
                        }
                    } else {
                        alert('Gagal menghapus image');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat menghapus image');
                });
            }
        }
    </script>
@endsection