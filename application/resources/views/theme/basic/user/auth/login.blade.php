@extends($activeTemplate.'layouts.frontend')

@section('content')
<div class="login-container">
    <h1>Fish Market Login</h1>
    <form class="login-form" action="login.php" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button class="login-button" type="submit">Login</button>
    </form>
</div>
@endsection

@push('style')

    <style>
       

        .login-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            width: 300px;
        }

        .login-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-button {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
        }

        .login-button:hover {
            background-color: #0056b3;
        }
    </style>
    
@endpush