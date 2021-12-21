<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{asset('assets/images/logo.png')}}">
</head>
<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                Data Post - <strong>EDIT DATA</strong>
            </div>
            <div class="card-body">
                <a href="/author/post" class="btn btn-primary">Kembali</a>
                <br/>
                <br/>

                <form method="post" action="/author/{{$post->id}}" enctype="multipart/form-data">

                {{ csrf_field() }}
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" name="title" class="form-control" value="{{$post->title}}" placeholder="Judul Post">

                        @if($errors->has('title'))
                        <div class="text-danger">
                            {{ $errors->first('title')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                    <label for="content">Isi Konten</label></br>
                    <textarea id="content" name="content" rows="4" cols="50">
                    {{$post->content}}
                    </textarea>
                    @if($errors->has('content'))
                        <div class="text-danger">
                            {{ $errors->first('content')}}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="date" class="form-control" placeholder="Isi Konten">

                        @if($errors->has('date'))
                        <div class="text-danger">
                            {{ $errors->first('date')}}
                        </div>
                        @endif

                    </div>
                        </br>
            </br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Simpan">
            </div>

        </form>

    </div>
</div>
</div>
</body>

</html>
