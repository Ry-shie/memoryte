<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MemoRyte - Home</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="header">
        <h1>MemoRyte<img src="https://static.thenounproject.com/png/1054620-200.png" alt="mr"></h1>
    </header>

    <section class="note-viewer">
        <a class="create-note" href="{{ route('notes.create')}}" title="Create Note">+ Note</a>
        @foreach ($notes as $note)
            <div class="note">
                <h3>{{ $note->title }}</h3>
                <p>{{$note->content}}</p>
                <a href="#" class="delete-link" id="deleteLink"><img src="https://cdn-icons-png.flaticon.com/512/1214/1214428.png" alt="delete"></a>
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
                <a href="{{ route('notes.edit', $note->id) }}"><img src="https://cdn-icons-png.flaticon.com/512/1827/1827951.png" alt="edit"></a>
                <a href="{{ route('notes.show', $note->id)}}"><img src="https://cdn-icons-png.flaticon.com/512/3183/3183361.png" alt="view"></a>
            </div> 
        @endforeach
    </section>

    <footer class="footer">
        <p>&copy; 2024 MemoRyte. All rights reserved.</p>
    </footer>
</body>
</html>