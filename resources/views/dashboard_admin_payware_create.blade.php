@extends('layouts.admin')

@section('title', 'Dashboard Admin Create Payware')

@section('content')
    <style>
        .main-page-admin {
            font-family: "Nexa";
            display: flex;
            flex-direction: column;
            gap: 18px;
            flex: 1;
            padding: 41px 90px;
            z-index: 1;
            min-height: 100vh;
            overflow: visible;
            scroll-behavior: smooth;
        }

        .admin-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 28px;
            width: 100%;
        }

        .back-btn {
            display: inline-block;
            padding: 6px 31px;
            border-radius: 999px;
            color: #000000;
            background-color: #fff;
            text-decoration: none;
            font-weight: 800;
            font-size: 30px;
            font-family: "Nexa";
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 16px;
            justify-content: flex-end;
            min-width: 260px;
        }

        .profile-card {
            display: flex;
            align-items: center;
            gap: 14px;
            border-radius: 24px;
            padding: 14px 16px;
            background: rgba(255, 255, 255, 0.16);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            color: #ffffff;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.16);
        }

        .profile-avatar {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background-color: #ffffff;
            display: grid;
            place-items: center;
            color: #25343f;
            font-weight: 700;
            font-size: 18px;
            box-shadow: inset 0 0 0 1px rgba(0, 0, 0, 0.04);
        }

        .profile-info .name {
            font-size: 16px;
            font-weight: 700;
            color: #ffffff;
        }

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

        .form-group {
            margin-bottom: 20px;
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

        @media (max-width: 980px) {
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

        @media (max-width: 680px) {
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
        <div class="container">
            <div class="top-card">
                <h2>Create New Payware Product</h2>
            </div>

            <form action="{{ route('admin.payware.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="image">Product Image</label>
                    <input type="file" id="image" name="image" accept="image/*">
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
                    <select id="category" name="category" required>
                        <option value="">Select Category</option>
                        <option value="Train Simulator">Train Simulator</option>
                        <option value="Route">Route</option>
                        <option value="Locomotive">Locomotive</option>
                        <option value="Wagon">Wagon</option>
                        <option value="Scenery">Scenery</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="active">Active</label>
                    <select id="active" name="active">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <div class="button-group">
                    <a href="{{ route('admin.payware.index') }}" class="btn btn-cancel">Cancel</a>
                    <button type="submit" class="btn btn-save">Save Product</button>
                </div>
            </form>
        </div>
    </div>
@endsection