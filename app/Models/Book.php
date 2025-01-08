<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Jadvalga kiritilishi mumkin bo‘lgan ustunlar
    protected $fillable = [
        'name',        // Kitob nomi
        'author',      // Muallif ismi
        'description', // Kitob haqida tavsif
        'file',        // Kitob faylining yo‘li
    ];
}
