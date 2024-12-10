<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-page">
    <div class="login-box">
        <h2>Войти</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="login-textbox">
                <input type="email" placeholder="Электронная почта" name="email" value="{{ old('email') }}" required>
                @error('email')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="login-textbox">
                <input type="password" placeholder="Пароль" name="password" required>
                @error('password')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="login-btn">Войти</button>
        </form>
        <p class="register-link">Нет аккаунта? <a href="{{ route('register') }}">Зарегистрироваться</a></p>
    </div>
</div>
</body>
</html>
