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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>SPA</title>
</head>
<body>
<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-dark m-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
Add comment
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add comment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('comments.store') }}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="form-group m-3">
                        <input type="text" class="form-control " name="name" placeholder="Enter your name">
                    </div>
                    <div class="form-group m-3">
                        <input type="email" class="form-control " name="email" placeholder="Enter email">
                    </div>
                    <div class="form-group m-3">
                        <input type="text" class="form-control " name="url" placeholder="url">
                    </div>
                    <div class="form-group m-3">
                        <textarea class="ckeditor form-control"  name="text" rows="3"></textarea>
                    </div>
                    <div class="form-group m-3">
                        <input type="file" name="file" class="form-control-file ">
                    </div>
                    <div class="form-group m-3">
                        <input type="hidden" class="form-control-hidden " name="parent_id">
                    </div>
                    <button type="submit" class="btn btn-primary m-3">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Created at</th>
            <th class="w-50" scope="col">Comment</th>
        </tr>
        </thead>
        <tbody>
        @foreach($comments as $comment)
        <tr>
            <td>{{ $comment->user->name }}</td>
            <td>{{ $comment->user->email }}</td>
            <td>{{ Carbon\Carbon::parse($comment->created_at)->toDateTimeString() }}</td>
            <td>{!! $comment->text !!}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="m-3">
        {{ $comments->links() }}
    </div>

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
