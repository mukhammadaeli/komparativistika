<?php

namespace App\Models;

// Laravel modullari va Spatie roli funksiyalarini ulash
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles; // Foydalanuvchi modeli uchun funksiyalar

    /**
     * Massaviy ravishda to‘ldirilishi mumkin bo‘lgan atributlar.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',     // Foydalanuvchi ismi
        'email',    // Foydalanuvchi emaili
        'password', // Foydalanuvchi paroli
    ];

    /**
     * Seriyalizatsiya uchun yashirilishi kerak bo‘lgan atributlar.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',        // Parolni yashirish
        'remember_token',  // "Remember Me" tokenini yashirish
    ];

    /**
     * Kasting qilinishi kerak bo‘lgan atributlar.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', // Email tasdiqlash sanasi
            'password' => 'hashed',           // Parol avtomatik ravishda hashlanadi
        ];
    }
}
