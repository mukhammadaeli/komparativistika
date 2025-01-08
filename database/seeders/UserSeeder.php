<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Ma'lumotlar bazasini foydalanuvchilar bilan to'ldirish.
     */
    public function run()
    {
        // Admin foydalanuvchini yaratish
        $admin = User::create([
            'name' => 'Admin User', // Admin ismi
            'email' => 'admin@example.com', // Admin emaili
            'password' => bcrypt('password'), // Parol (hash qilinadi)
        ]);
        // Admin foydalanuvchisiga 'admin' rolini biriktirish
        $admin->assignRole('admin');

        // Viewer (ko‘ruvchi) foydalanuvchini yaratish
        $viewer = User::create([
            'name' => 'Viewer User', // Viewer ismi
            'email' => 'viewer@example.com', // Viewer emaili
            'password' => bcrypt('password'), // Parol (hash qilinadi)
        ]);
        // Viewer foydalanuvchisiga 'viewer' rolini biriktirish
        $viewer->assignRole('viewer');
    }
}
