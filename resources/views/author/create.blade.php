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
<form action="{{route('author.store')}}" method="post">
    @csrf
    @error('name')
    <div>{{ $message }}</div>
    @enderror
    <lable for="name">ФИО</lable>
    <input id="name" name="name" value="" type="text"><br>
    <input type="submit" value="Добавить">
</form>
</body>
</html>
