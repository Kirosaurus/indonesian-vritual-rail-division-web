@extends('layouts.admin')

@section('title', 'Dashboard Admin Create Payware')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/products/create.css') }}" />
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
                <h2>Create New Product</h2>
            </div>



            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="image">Product Image</label>
                    <input type="file" id="images" name="image[]" accept="image/*" multiple>
                </div>

                <div class="form-group">
                    <label for="type">Type</label>
                    <select id="type" name="type" required>
                        <option value="">Select a Type</option>
                        <option value="payware">Payware</option>
                        <option value="freeware">Freeware</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" required></textarea>
                </div>

                <div class="form-group">
                    <label for="price">Price (IDR)</label>
                    <input type="number" id="price" name="price" step="0.01" min="0" required>
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <div class="row-input">
                        <select id="category" name="category" required>
                            <option value="">Select a Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <div id="add-category-btn">
                            <img src="{{ asset('icons/plusBlack_icon.svg') }}" alt="Icon Plus"
                                style="width: 20px; height: 20px;">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="tags">Tags (pisahkan dengan koma)</label>
                    <textarea id="tags" name="tags" placeholder="Android Version, Android Only, All Support,..."></textarea>
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
                    <a href="{{ route('admin.products.index') }}" class="btn btn-cancel">Cancel</a>
                    <button type="submit" class="btn btn-save">Save Product</button>
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
                    price.value = '';
                    price.setAttribute('required', 'required');
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
    </script>
@endsection