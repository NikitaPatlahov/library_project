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
<table>
    <tr>
        <th>ID</th>
        <th>Название</th>
        <th>Автор(ы)</th>
        <th>Год издания</th>
    </tr>
        <tr>
            <td>{{$book->id}}</td>
            <td>{{$book->title}}</td>
            <td>@foreach($book->authors as $bookAuthor){{ $bookAuthor->name }}<br>@endforeach</td>
            <td>{{$book->year}}</td>
            <td><a href="{{ route('book.edit',$book->id) }}"><button>Редактировать</button></a></td>
            <td><a href=""><button>Удалить</button></a></td>
        </tr>
</table>
<a href="{{ route('book.index') }}">
    <button>Назад</button>
</a>

</body>
</html>

