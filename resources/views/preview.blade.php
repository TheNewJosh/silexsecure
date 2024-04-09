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
        @if (session('error'))
            <div class="badge bg-danger text-center">
                <h2 class="text-white">{{ session('error') }}</h2>
            </div>
        @endif
        </p>
        <form>
            <div class="form-group">
                <label for="exampleInptuname">File Label</label>
                <input type="name" value="{{$file->file_name}}" class="form-control" id="exampleInptuname" aria-describedby="emailHelp" placeholder="Enter name" readonly>
            </div>
            <div class="form-group">
                <label for="exampleInptuname">File Size</label>
                <input type="name" value="{{$file->file_size}}" class="form-control" id="exampleInptuname" aria-describedby="emailHelp" placeholder="Enter name" readonly>
            </div>
            <a href="{{ route('download', ['unid' => $file->unid])}}" class="mt-2 btn btn-primary">
            Download
            </a>
            
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
