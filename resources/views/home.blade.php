<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>
    <h1>Memo</h1>
    <form action="/add" method="post">
    @csrf
        <input type="text" name="memo">
        <input type="submit" value="Add">
    </form>
    <div class="content">
        @foreach ($posts as $post)
        <p>{{$post->id}}</p>
        @endforeach
    </div>
</body>
</html>