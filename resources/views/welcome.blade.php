<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>File Share</title>

        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body class="" style="width:500px; margin-left:auto; margin-right:auto; margin-top:100px;">
        <h2>Secure File Share</h2>
        <p>
        @if (session('status'))
            <div class="badge bg-success text-center">
                <h2 class="text-white">{{ session('status') }}</h2>
            </div>
        @endif
        </p>
        <form action="{{ route('upload')}}" method="Post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInptuname">User Name</label>
                <input type="name" name="name" class="form-control" id="exampleInptuname" aria-describedby="emailHelp" placeholder="Enter name" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email Address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Expired Date</label>
                <input type="date" name="expired" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter date" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">File Password</label>
                <input type="text" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">File</label>
                <input class="form-control" name="file" type="file" id="formFile" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
