<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="register-page">
    <div class="register-box">
        <h2>Регистрация</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="register-textbox">
                <input type="text" placeholder="Имя" name="name" value="{{ old('name') }}" required>
                @error('name')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="register-textbox">
                <input type="email" placeholder="Электронная почта" name="email" value="{{ old('email') }}" required>
                @error('email')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="register-textbox">
                <input type="password" placeholder="Пароль" name="password" required>
                @error('password')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="register-textbox">
                <input type="password" placeholder="Подтвердите пароль" name="password_confirmation" required>
            </div>
            <button type="submit" class="register-btn">Зарегистрироваться</button>
        </form>
        <p class="login-link">Уже есть аккаунт? <a href="{{ route('login') }}">Войти</a></p>
    </div>
</div>
</body>
</html>
