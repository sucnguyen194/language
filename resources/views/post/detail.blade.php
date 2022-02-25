<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <div class="w-75 m-auto">
        <a class="btn btn-primary" href="{{url('/')}}">Trang chủ</a>
        <a href="{{route('change.locale','vi')}}" class="btn btn-success">VietNamese</a>
        <a href="{{route('change.locale','en')}}" class="btn btn-info">English</a>

        <a href="{{route('posts.create')}}" class="btn btn-primary">Create</a>
        @if ( Session::get('locale') == 'en')

        {{ 'Current Language is English' }}
     
        @elseif ( Session::get('locale') == 'vi' )
     
        {{ 'Ngôn ngữ hiện tại là tiếng Việt' }}
     
        @endif
      
        <div>
          Tên       :  {{$post->title}} <br>
          Slug      :  {{$post->slug}} <br>
          Ngôn ngữ  :  {{$post->locale}} <br>
        </div>

    </div>
</body>
</html>
