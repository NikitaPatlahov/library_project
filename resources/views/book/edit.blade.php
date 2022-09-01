<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{ route('book.update', $book->id) }}" method="post">
    @csrf
    @method('patch')
    <label for="title">Название</label>
    <input type="text" name="title" id="title" value="{{$book->title}}"><br>
    <label for="year">Год издания</label>
    <input type="text" name="year" id="year" value="{{$book->year}}"><br>
    <label for="author">Авторы</label>
    <select multiple name="authors[]" id="author"><br>
        @foreach($authors as $author)
        <option value="{{$author->id}}">{{ $author->name }}</option>
        @endforeach
    </select><br>
    <button type="submit">Сохранить</button>
</form>
<a href="{{route('book.index')}}"><button>Назад</button></a>
</body>
</html>
