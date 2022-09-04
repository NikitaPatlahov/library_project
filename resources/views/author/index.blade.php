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
@if(session('success'))
   <h3>{{session('success')}}</h3>
@endif
<table>
    <tr>
        <th>ID</th>
        <th>ФИО</th>
        <th>Количество книг</th>
    </tr>
    @foreach($authors as $author)
        <tr>
            <td> {{ $author->id }}</td>
            <td>{{ $author->name }}</td>
            <td>{{ $author->books->count('title') }}</td>
            <td><a href="{{ route('author.edit', $author->id) }}">
                    <button>Редактировать</button>
                </a></td>
            <form action="{{route('author.destroy', $author->id)}}" method="post">
                @method('delete')
                @csrf
                <td><a href="">
                        <button>Удалить</button>
                    </a></td>
            </form>
        </tr>

    @endforeach
</table>
<a href="{{route('author.create')}}">
    <button>Добавить</button>
</a>
</body>
</html>
