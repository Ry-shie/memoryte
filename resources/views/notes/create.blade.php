<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Memoryte</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="header">
        <h1><img src="https://static.thenounproject.com/png/1054620-200.png" alt="mr">MemoRyte</h1>
        <a href="{{ route('notes.index') }}"><img class="img" src="https://icons.veryicon.com/png/o/miscellaneous/tool-icon-library/return-104.png" alt="return"></a>
    </header>

    <section class="note-creator">
    <form action="{{ route('notes.store') }}" method="POST">
        @csrf
        <input type="text" name="title" id="title" placeholder="Title" value="{{ old('title') }}">
        <hr>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif
        <textarea type="text" name="content" id="content" placeholder="Your note here..." oninput="autoResize(this)">{{ old('content') }}</textarea>
        <script>
            function autoResize(textarea) {
                textarea.style.height = 'auto';
                textarea.style.height = textarea.scrollHeight + 'px';
            }
        </script>
        <button>Save</button>
    </form>
    </section>

    <footer class="footer">
        <p>&copy; 2024 MemoRyte. All rights reserved.</p>
    </footer>
</body>
</html>