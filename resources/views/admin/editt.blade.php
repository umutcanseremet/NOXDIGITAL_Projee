<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Düzenleme Sayfası</title>
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
                <a class="nav-link" href="{{route('formMessage')}}">Form</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container-fluid">
    <div class="card m-4">
        <div class="card-body">
            <h5 class="card-title">Düzenle</h5>
            <form action="{{route('updateForm',$veri->id)}}" method="post" enctype="multipart/form-data">
                @method('put')
                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @csrf
                <div class="form-group my-4">
                    <label for="name">Ad</label>
                    <input type="text" class="form-control" placeholder="Ad Soyad" name="name" min="5"
                           required value="{{$veri->name}}">
                </div>
                <div class="form-group my-4">
                    <label for="writer">Email</label>
                    <input type="text" class="form-control" placeholder="Yazar İsmini Giriniz" name="email" min="5"
                           required value="{{$veri->email}}">
                </div>
                <div class="form-group my-4">
                    <label for="exampleFormControlTextarea1">Yazı</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" cols="40" rows="10" name="message"
                              min="10" required name="text">{{$veri->message}}</textarea>
                </div>
                <button class="btn btn-block btn-primary" type="submit">Formu Güncelle</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>

