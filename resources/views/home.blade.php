<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <h1>Memo</h1>
    <form action="/add" method="post">
    @csrf
        <input type="text" name="memo">
        <input type="submit" value="Add">
    </form>
    <div class="content" id="app">
        @foreach ($posts as $post)
        <div>
            <p>{{$post->id}}</p>
            <p>{{$post->memo}}</p>
            <like-component :post_id="{{$post->id}}"></like-component>
        </div>
        @endforeach
    </div>
    <script src="{{mix('js/app.js')}}"></script>
</body>
</html>