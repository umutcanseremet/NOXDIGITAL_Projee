<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Ana Sayfa</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('adminIndex')}}">Yazılar<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('adminArticles')}}">Yazı Ekle</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('adminComments')}}">Yorum Ekle</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('commentData')}}">Yorumlar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('formMessage')}}">Form</a>
            </li>
        </ul>
    </div>
</nav>
<table class="table">


    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Başlık</th>
        <th scope="col">Yazı</th>
        <th scope="col">Kısa Yazı</th>
        <th scope="col">İşlem1</th>
        <th scope="col">İşlem2</th>
    </tr>

    </thead>
    @foreach($articles as $value)
    <tbody>
    <tr>
        <th scope="row">{{$value->id}}</th>
        <td>{{$value->title}}</td>
        <td>{{$value->text}}</td>
        <td>{{$value->short_writing}}</td>
        <form class="px-3" method="post" action="{{route('delete',$value['id'])}}">
            @method('delete')
            @csrf
            <td><button type="submit" class="btn btn-danger">Sil</button></td>
        </form>
        <td><a href="{{route('edit',$value['id'])}}">
            <button class="btn btn-success">Düzenle</button>
        </a></td>
    </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
