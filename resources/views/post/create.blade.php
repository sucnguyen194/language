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
<div class="container">
    <div class="w-50 m-auto card">
        <form method="post" action="{{route('posts.store')}}">
            @csrf
            <ul class="nav nav-tabs" role="tablist">
                @foreach(config('app.language') as $lang)
                    <li class="nav-item">
                        <a class="nav-link {{$loop->first ? 'active' : ''}}" href="#{{$lang}}" role="tab" data-toggle="tab">{{$lang}}</a>
                    </li>
                @endforeach
            </ul>

            <!-- Tab panes -->
            <div class="p-4">
                <div class="tab-content form-group">
                    @foreach(config('app.language') as $key => $lang)
                        <div role="tabpanel" class="tab-pane {{$loop->first ? 'in active' : ''}}" id="{{$lang}}">
                            <div class="form-group">
                                <label>Title ({{$lang}})</label>
                                <input type="text" class="form-control" name="translation[{{$key}}][title]">
                            </div>
                            <div class="form-group">
                                <label>Slug ({{$lang}})</label>
                                <input type="text" class="form-control" name="translation[{{$key}}][slug]">
                            </div>
                            <div class="form-group">
                                <label>Locale ({{$lang}})</label>
                                <input type="text" class="form-control" name="translation[{{$key}}][locale]" value="{{$lang}}">
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <input type="checkbox" value="1" name="status" checked> Status
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </div>



        </form>
    </div>
</div>

</body>
</html>
