@extends('layouts.admin')

@section('title', 'Dashboard Admin Edit Product')

@section('content')
    <style>

        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.16);
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }

        .top-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .top-card h2 {
            color: #FF9B51;
            font-size: 46px;
            font-weight: 800;
            margin: 0;
        }

        .image-thumb-wrapper {
            position: relative;
            display: inline-block;
            border-radius: 10px;
            overflow: hidden;
            border: 2px solid #e0e0e0;
            transition: border-color 0.2s ease;
        }

        .image-thumb-wrapper:hover {
            border-color: #FF9B51;
        }

        .image-thumb-wrapper img {
            display: block;
            width: 150px;
            height: 150px;
            object-fit: cover;
        }

        .delete-image-btn {
            position: absolute;
            top: 6px;
            right: 6px;
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background-color: rgba(220, 53, 69, 0.85);
            color: white;
            font-size: 13px;
            font-weight: 700;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transform: scale(0.7);
            transition: opacity 0.2s ease, transform 0.2s ease, background-color 0.2s ease;
            line-height: 1;
        }

        .image-thumb-wrapper:hover .delete-image-btn {
            opacity: 1;
            transform: scale(1);
        }

        .delete-image-btn:hover {
            background-color: #dc3545;
            transform: scale(1.1) !important;
        }

        .delete-image-btn:active {
            transform: scale(0.95) !important;
        }


        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #25343f;
            font-size: 18px;
            font-weight: 700;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 12px 16px;
            border-radius: 10px;
            border: 2px solid #e0e0e0;
            font-size: 16px;
            font-family: "Nexa";
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #FF9B51;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .button-group {
            display: flex;
            gap: 15px;
            justify-content: flex-end;
            margin-top: 30px;
        }

        .btn {
            padding: 12px 24px;
            border-radius: 10px;
            font-size: 18px;
            font-weight: 700;
            font-family: "Nexa";
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-save {
            background-color: #FF9B51;
            color: #fff;
            box-shadow: 0 0 10px rgba(255, 155, 81, 0.3);
        }

        .btn-save:hover {
            background-color: #e68946;
            box-shadow: 0 0 15px rgba(255, 155, 81, 0.5);
        }

        .btn-cancel {
            background-color: #dc3545;
            color: #fff;
        }

        .btn-cancel:hover {
            background-color: #c82333;
        }

        .row-input {
            gap: 10px;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-items: center;
            width: 100%;
        }

        #add-category-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            background-color: white;
            border-radius: 10px;
            border: 2px solid #e0e0e0;
            transition: all 0.1s ease-in-out;
        }

        #add-category-btn:hover {
            scale: 1.05;
            cursor: pointer;
        }

        #add-category-btn:active {
            scale: 0.95;
            cursor: pointer;
        }

        .popup-category {
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            inset: 0;
            z-index: 999;
            transition: all 0.5s ease-in-out;
        }

        .popup-category.hidden {
            filter: blur(10px);
            pointer-events: none;
            opacity: 0;
            z-index: -1;
        }

        #popup-container {
            transform-origin: center;
            background-color: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.16);
            width: 100%;
            height: auto;
            max-width: 800px;
            margin: auto 100px;
            transition: all 0.5s ease-in-out;
        }

        .popup-overlay {
            z-index: -1;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.75);
            opacity: 1;
            transition: opacity 0.25s ease, backdrop-filter 0.25s ease;
        }

        @media screen and (max-width: 980px) {
            .main-page-admin {
                padding: 30px 30px 50px;
            }

            .container {
                max-width: 680px;
                padding: 30px;
            }

            .top-card h2 {
                font-size: 38px;
            }

            .form-group label {
                font-size: 16px;
            }

            .form-group input,
            .form-group textarea,
            .form-group select {
                font-size: 15px;
                padding: 11px 14px;
            }

            .btn {
                font-size: 16px;
                padding: 12px 22px;
            }
        }

        @media screen and (max-width: 680px) {
            .main-page-admin {
                padding: 24px 18px 36px;
            }

            .container {
                width: 100%;
                max-width: 100%;
                padding: 24px;
                border-radius: 18px;
            }

            .top-card {
                flex-direction: column;
                align-items: flex-start;
                gap: 18px;
            }

            .top-card h2 {
                font-size: 32px;
            }

            .form-group label {
                font-size: 15px;
            }

            .form-group input,
            .form-group textarea,
            .form-group select {
                font-size: 15px;
                padding: 12px 14px;
            }

            .button-group {
                flex-direction: column;
                align-items: stretch;
            }

            .btn {
                width: 100%;
                font-size: 16px;
            }
        }
    </style>

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