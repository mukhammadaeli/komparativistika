<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

// Bosh sahifa - Barcha kitoblar ro‘yxatini ko‘rsatish
Route::get('/', [BookController::class, 'books'])->name('home');

// Foydalanuvchini login qilish sahifasi
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Login jarayonini boshqarish
Route::post('/login', [AuthController::class, 'login']);

// Ro‘yxatdan o‘tish sahifasi
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
// Ro‘yxatdan o‘tish jarayonini boshqarish
Route::post('/register', [AuthController::class, 'register']);

// Logout jarayonini boshqarish
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Kitoblarni boshqarish uchun marshrutlar
Route::resource('books', BookController::class)->only(['store', 'destroy']);
// Muayyan kitobni ko‘rsatish
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
