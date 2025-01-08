<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Rollarni ma'lumotlar bazasiga kiritish.
     */
    public function run()
    {
        // Admin roli yaratish
        Role::create(['name' => 'admin']);

        // Viewer (ko‘ruvchi) roli yaratish
        Role::create(['name' => 'viewer']);
    }
}
