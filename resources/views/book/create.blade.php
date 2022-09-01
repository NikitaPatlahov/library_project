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
<form action="{{route('book.store')}}" method="post">
    @csrf
    <label for="title">Название</label>
    <input type="text" name="title" id="title" value=""><br>
    <label for="year">Год издания</label>
    <input type="text" name="year" id="year" value=" "><br>
    <label for="author">Авторы</label>
    <select multiple name="authors[]" id="author"><br>
        @foreach($authors as $author)
        <option value="{{$author->id}}">{{ $author->name }}</option>
        @endforeach
    </select><br>
    <button type="submit">Добавить</button>
</form>
<a href="{{route('book.index')}}"><button>Назад</button></a>
</body>
</html>
