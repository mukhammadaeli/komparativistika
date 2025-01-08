@extends('layouts.app')

@section('title', 'Корпоративистика')

@section('content')
    <div class="book_start-d" style="display: flex;justify-content: space-between;width: 100%; gap: 100px">
        <section class="left">
            <img src="https://media.istockphoto.com/id/1452331890/vector/3d-book-with-blank-blue-cover.jpg?s=1024x1024&w=is&k=20&c=mEGsAIIyuicQhOYG0kLsQpQaZPohAo74Ydvb4XPNBtQ=" alt="Фото книги" class="doc-preview">
        </section>
        <section class="right">
            <h1>{{ $book->name }}</h1>
            <p class="author">Автор: <span>{{ $book->author }}</span></p>
            <p class="author">{{ $book->description }}</p>
            @if ($book->file)
                <p><strong>Файл:</strong> <a href="{{ asset('storage/' . $book->file) }}" download>Скачать</a></p>
            @endif
            @role('admin')
            <div style="display: flex; gap: 10px;margin-top: 10px" class="btns-book">
                <form action="{{ route('books.destroy', $book->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button style="background: red;padding: 8px 12px;border-radius: 8px;color: #fff;border: none">O'chirish</button>
                </form>
                <button onclick="showPopup()" style="background: green;padding: 8px 12px;border-radius: 8px;color: #fff;border: none">Yangilash</button>
                @endrole()

            </div>

        </section>
    </div>

    @include('partials.book-list')
@endsection

<div class="overlay" id="overlay">
    <div class="popup" id="popup">
        <div class="decorative-shape shape-1"></div>
        <div class="decorative-shape shape-2"></div>
        <button class="close-button" onclick="hidePopup()">&times;</button>
        <div class="popup-content">
            <h2>Yangilash</h2>
            <p>Yangilash</p>
            <form id="leadForm" action="{{ route('books.update', $book->id ) }}" onsubmit="handleSubmit(event)" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Nomi</label>
                    <input type="text" id="name" name="name" value="{{ $book->name }}" required placeholder="Nomi">
                </div>
                <div class="form-group">
                    <label for="email">Avtor</label>
                    <input type="text" id="author" name="author" value="{{ $book->author }}" required placeholder="Avtor">
                </div>
                <div class="form-group">
                    <label for="email">Izoh</label>
                    <input type="text" id="description" name="description" value="{{ $book->description }}" required placeholder="Izoh">
                </div>
                <button type="submit" class="submit-button">Update</button>
            </form>
        </div>
    </div>
</div>
<script >
    function showPopup() {
        const overlay = document.getElementById('overlay');
        const popup = document.getElementById('popup');
        overlay.style.display = 'block';
        setTimeout(() => {
            popup.classList.add('active');
        }, 10);
    }

    function hidePopup() {
        const overlay = document.getElementById('overlay');
        const popup = document.getElementById('popup');
        popup.classList.remove('active');
        setTimeout(() => {
            overlay.style.display = 'none';
        }, 300);
    }


</script>
