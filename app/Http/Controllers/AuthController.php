<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Login sahifasini ko‘rsatish.
     */
    public function showLoginForm()
    {
        return view('auth.login'); // Login uchun Blade faylni ko‘rsatish
    }

    /**
     * Login jarayonini boshqarish.
     */
    public function login(Request $request)
    {
        // Foydalanuvchi kiritgan ma'lumotlarni tekshirish
        $request->validate([
            'email' => 'required|email', // Email talab qilinadi
            'password' => 'required', // Parol talab qilinadi
        ]);

        // Foydalanuvchini tizimga kiritish
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('home'); // Muvaffaqiyatli login bo‘lsa, asosiy sahifaga yo‘naltirish
        }

        // Login muvaffaqiyatsiz bo‘lsa, xatolik qaytarish
        return back()->withErrors([
            'email' => 'Kiritilgan email yoki parol noto‘g‘ri.', // Xatolik xabari
        ]);
    }

    /**
     * Ro‘yxatdan o‘tish sahifasini ko‘rsatish.
     */
    public function showRegisterForm()
    {
        return view('auth.register'); // Ro‘yxatdan o‘tish uchun Blade faylni ko‘rsatish
    }

    /**
     * Ro‘yxatdan o‘tish jarayonini boshqarish.
     */
    public function register(Request $request)
    {
        // Foydalanuvchi kiritgan ma'lumotlarni tekshirish
        $request->validate([
            'name' => 'required|string|max:255', // Foydalanuvchi ismi talab qilinadi
            'email' => 'required|email|unique:users,email', // Email yagona bo‘lishi kerak
            'password' => 'required|string|min:8|confirmed', // Parol tasdiqlanishi va 8 belgidan kam bo‘lmasligi kerak
        ]);

        // Yangi foydalanuvchini yaratish
        $user = User::create([
            'name' => $request->name, // Foydalanuvchi ismi
            'email' => $request->email, // Foydalanuvchi emaili
            'password' => Hash::make($request->password), // Parolni hash qilish
        ]);

        // Foydalanuvchiga standart rolni biriktirish
        $user->assignRole('user'); // Standart rol (ehtiyojingizga qarab o‘zgartiring)

        return redirect()->route('login')->with('success', 'Ro‘yxatdan o‘tish muvaffaqiyatli yakunlandi. Tizimga kiring.');
    }

    /**
     * Logout jarayonini boshqarish.
     */
    public function logout(Request $request)
    {
        // Foydalanuvchini tizimdan chiqarish
        Auth::logout();
        return redirect()->route('login'); // Login sahifasiga yo‘naltirish
    }
}
