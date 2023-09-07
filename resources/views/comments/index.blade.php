<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>SPA</title>
</head>
<body>
    <form action="{{ route('comments.store') }}" method="POST" enctype='multipart/form-data'>
        @csrf
        <div class="form-group">
            <input type="text" class="form-control m-3" name="name" placeholder="Enter your name">
        </div>
        <div class="form-group">
            <input type="email" class="form-control m-3" name="email" placeholder="Enter email">
        </div>
        <div class="form-group">
            <input type="text" class="form-control m-3" name="url" placeholder="url">
        </div>
        <div class="form-group">
            <textarea class="form-control m-3" name="text" rows="3"></textarea>
        </div>
        <div class="form-group">
            <input type="file" name="file" class="form-control-file m-3">
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control-hidden m-3" name="parent_id">
        </div>
        <button type="submit" class="btn btn-primary m-3">Submit</button>
    </form>
</body>
</html>
