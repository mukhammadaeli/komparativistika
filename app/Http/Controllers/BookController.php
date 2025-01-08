<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Yangi kitobni qo‘shish.
     */
    public function store(Request $request)
    {
        // Foydalanuvchi kiritgan ma'lumotlarni tekshirish
        $request->validate([
            'name' => 'required|string|max:255', // Kitob nomi talab qilinadi
            'author' => 'required|string|max:255', // Muallif ismi talab qilinadi
            'description' => 'nullable|string', // Tavsif ixtiyoriy
            'file' => 'required|file', // Kitob fayli talab qilinadi
        ]);

        // Yuklangan faylni saqlash
        $filePath = $request->file('file')->store('books'); // Faylni "books" papkasiga saqlash

        // Kitob yozuvini yaratish
        Book::create([
            'name' => $request->name, // Kitob nomi
            'author' => $request->author, // Muallif
            'description' => $request->description, // Tavsif
            'file' => $filePath, // Fayl yo‘li
        ]);

        // Asosiy sahifaga yo‘naltirish
        return redirect()->route('home')->with('success', 'Kitob muvaffaqiyatli qo‘shildi!');
    }

    /**
     * Kitobni o‘chirish.
     */
    public function destroy(Book $book)
    {
        // Fayl mavjud bo‘lsa, uni o‘chirish
        // if ($book->file) {
        //     \Storage::delete($book->file);
        // }

        // Kitob yozuvini o‘chirish
        $book->delete();

        // Asosiy sahifaga yo‘naltirish
        return redirect()->route('home')->with('success', 'Kitob muvaffaqiyatli o‘chirildi!');
    }

    /**
     * Alohida kitobni ko‘rsatish.
     */
    public function show(Book $book)
    {
        $books = Book::all(); // Barcha kitoblarni olish
        return view('book', compact('book', 'books')); // Blade ko‘rinishga uzatish
    }


    /**
     * Kitobni yangilash.
     */
    public function update(Request $request, Book $book)
    {
        // Foydalanuvchi kiritgan ma'lumotlarni tekshirish
        $request->validate([
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        // Kitob ma'lumotlarini yangilash
        $book->update([
            'name' => $request->name,
            'author' => $request->author,
            'description' => $request->description,
        ]);

        return redirect()->route('home')->with('success', 'Kitob muvaffaqiyatli yangilandi!');
    }

    /**
     * Kitoblar ro‘yxatini ko‘rsatish.
     */
    public function books()
    {
        $books = Book::all(); // Barcha kitoblarni olish
        return view('book-list', compact('books')); // Blade ko‘rinishga uzatish
    }
}
