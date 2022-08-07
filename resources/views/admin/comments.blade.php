<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
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
<div class="container">
    <div class="row">
        <div class="col-md-4.col-md-offset-4">
            <h4>Yorum Ekle</h4>
            <hr></hr>
            <form action="{{route('admin_comments_save')}}" method="post" enctype="multipart/form-data">
                @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @csrf
                <div class="mb-3">
                    <label for="formFile" class="form-label">Resim Seçin</label>
                    <input class="form-control" name="image" type="file" id="formFile" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label for="name">Yorum Başlığı</label>
                    <input type="text" class="form-control" placeholder="Yorum Başlığı" name="email" required>
                   @error('name'){{$message}}@endif</span>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Yorum</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Yorum" cols="60" rows="10" name="comments" maxlength="120"></textarea>
                </div>
                <div class="form-group">
                    <label for="writer">Ad Soyad</label>
                    <input type="text" class="form-control" placeholder="Ad-Soyad" name="name" required>
                </div>
                <button class="btn btn-block btn-primary" type="submit">Yorumu Ekle</button>
        </div>
        </form>
    </div>
</div>
</div>
</body>
</html>
