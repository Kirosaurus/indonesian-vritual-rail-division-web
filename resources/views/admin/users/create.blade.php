@extends('layouts.admin')

@section('title', 'Dashboard Admin Create User')

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

        .form-group {
            margin-bottom: 20px;
            font-family: "Nexa";
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #25343f;
            font-size: 18px;
            font-weight: 700;
        }

        .form-group input,
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
        .form-group select:focus {
            outline: none;
            border-color: #FF9B51;
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

            .button-group {
                flex-direction: column;
                text-align: center;
            }

            .form-group label {
                font-size: 15px;
            }

            .form-group input,
            .form-group select {
                font-size: 15px;
                padding: 12px 14px;
            }

            .button-group {
                flex-direction: column;
                align-items: stretch;
            }
        }
    </style>

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