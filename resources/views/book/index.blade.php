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

<form action="{{ route('book.filter') }}" method="get">
    <select name="author" id="author">
        @foreach($authors as $author)
            <option {{ $author->name === request()->author ? ' selected' : '' }} value="{{$author->name}}"> {{$author->name}}</option>
        @endforeach
    </select>
    <br><input type="submit" value="Применить">
</form>
<a href="{{route('book.index')}}"><button>Сбросить</button></a>

@if(session('success'))
    <h3>{{session('success')}}</h3>
@endif
<table>
    <tr>
        <th>ID</th>
        <th>Название</th>
        <th>Автор(ы)</th>
        <th>Год издания</th>
    </tr>
    @foreach($books as $book)
        <tr>
            <td>{{$book->id}}</td>
            <td><a href="{{route('book.show', $book->id)}}">{{$book->title}}</a></td>
            <td>@foreach($book->authors as $bookAuthor)
                    {{ $bookAuthor->name }}<br>
                @endforeach</td>
            <td>{{$book->year}}</td>
            <td><a href="{{ route('book.edit', $book->id)}}">
                    <button>Редактировать</button>
                </a></td>
            <form action="{{route('book.destroy', $book->id)}}" method="post">
            @csrf
            @method('delete')
            <td><a href="">
                    <button>Удалить</button>
                </a></td>
            </form>
        </tr>
    @endforeach
</table>
<a href="{{ route('book.create') }}">
    <button>Добавить</button>
</a>
</body>
</html>

