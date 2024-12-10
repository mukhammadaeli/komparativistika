<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Корпоративистика')</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
@include('partials.header')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<main class="content">
    @yield('content')
</main>

@include('partials.footer')
<script>
    document.getElementById('openPopup').addEventListener('click', function () {
        document.getElementById('popupForm').style.display = 'block';
    });

    document.getElementById('closePopup').addEventListener('click', function () {
        document.getElementById('popupForm').style.display = 'none';
    });

    document.getElementById('bookForm').addEventListener('submit', async function (e) {
        e.preventDefault();

        const formData = new FormData(this);

        try {
            const response = await fetch("{{ route('books.store') }}", {
                method: 'POST',
                body: formData,
            });

            if (response.ok) {
                alert('Book added successfully!');
                location.reload(); // Reload to update the book list
            } else {
                alert('Failed to add book. Please try again.');
            }
        } catch (error) {
            console.error(error);
            alert('An error occurred. Please try again.');
        }
    });
</script>
</body>
</html>
