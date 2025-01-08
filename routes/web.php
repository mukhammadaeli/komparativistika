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


Route::middleware(['auth:sanctum', 'role:admin'])->get('/dashboard', function () {
    // Kitoblarni boshqarish uchun marshrutlar
    Route::resource('books', BookController::class)->only(['store', 'update']);
    // Kitobni ochirish
    Route::delete('/books/{book}/delete', [BookController::class, 'destroy'])->name('books.destroy');
});

Route::middleware(['auth:sanctum', 'role:user|admin'])->get('/dashboard', function () {
    // Logout jarayonini boshqarish
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    // Muayyan kitobni ko‘rsatish
    Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
});
