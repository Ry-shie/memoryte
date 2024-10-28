<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MemoRyte - {{ $note->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="header">
        <h1><img src="https://static.thenounproject.com/png/1054620-200.png" alt="mr">MemoRyte</h1>
        <a href="{{ route('notes.index') }}"><img class="img" src="https://icons.veryicon.com/png/o/miscellaneous/tool-icon-library/return-104.png" alt="return"></a>
        <a href="#" id="deleteLink"><img class="img" src="https://cdn-icons-png.flaticon.com/512/1214/1214428.png" alt="delete"></a>
        <form id="deleteForm" action="{{ route('notes.destroy', $note) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
        <script>
            document.getElementById('deleteLink').onclick = function(event) {
                event.preventDefault();
                if (confirm('Are you sure you want to delete this note?')) {
                    document.getElementById('deleteForm').submit();
                }
            };
        </script> 
        <a href="{{ route('notes.edit', $note->id) }}"><img class="img" src="https://cdn-icons-png.flaticon.com/512/1827/1827951.png" alt="edit"></a>
    </header>

    <section class="note-viewer">
        <h1>{{ $note->title }}</h1>
        <hr>
        <p>{{ $note->content }}</p>
    </section>

    <footer class="footer">
        <p>&copy; 2024 MemoRyte. All rights reserved.</p>
    </footer>
</body>
</html>