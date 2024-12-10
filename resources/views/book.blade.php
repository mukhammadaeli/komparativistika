@extends('layouts.app')

@section('title', 'Корпоративистика')

@section('content')
    <section class="left">
        <img src="book-cover.jpg" alt="Фото книги" class="doc-preview">
    </section>
    <section class="right">
        <h1>{{ $book->name }}</h1>
        <p class="author">Автор: <span>{{ $book->author }}</span></p>
        <p class="author">{{ $book->description }}</p>
        @if ($book->file)
            <p><strong>Файл:</strong> <a href="{{ asset('storage/' . $book->file) }}" download>Скачать</a></p>
        @endif    </section>
    @include('partials.book-list')
@endsection
