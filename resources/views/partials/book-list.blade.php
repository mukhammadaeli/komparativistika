<section class="book-list">
    <h2>Рекомендуемые книги по корпоративистике</h2>
    <div class="card-container">
        @foreach ($books as $book)
            <div class="card">
                <img src="https://media.istockphoto.com/id/1452331890/vector/3d-book-with-blank-blue-cover.jpg?s=1024x1024&w=is&k=20&c=mEGsAIIyuicQhOYG0kLsQpQaZPohAo74Ydvb4XPNBtQ=" alt="{{ $book->name }}" class="card-image">
                <h3>{{ $book->name }}</h3>
                <p>{{ $book->author }}</p>
                <a href="{{ route('books.show', $book->id) }}">
                    <button class="card-btn">Подробнее</button>
                </a>
            </div>
        @endforeach
    </div>
    @role('admin')
    <button class="add-book" id="openPopup">Добавить книгу</button>
    @endrole

    <!-- Popup Form -->
    <div class="popup" id="popupForm" style="display: none;">
        <form id="bookForm">
            @csrf
            <h3>Добавить книгу</h3>
            <input type="text" name="name" placeholder="Название книги" required>
            <input type="text" name="author" placeholder="Автор" required>
            <textarea name="description" placeholder="Описание"></textarea>
            <input type="file" name="file" accept=".pdf,.docx">
            <button type="submit">Добавить</button>
            <button type="button" id="closePopup">Закрыть</button>
        </form>
    </div>
</section>
