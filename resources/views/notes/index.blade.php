<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Notes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Website Notes | </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item" style="margin-right: 30px;">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item" style="margin-right: 30px;">
                    <a class="nav-link" href="#">Archive</a>
                </li>
                <li class="nav-item" style="margin-right: 30px;">
                    <a class="nav-link" href="#">Gallery</a>
                </li>
            </ul>
            </div>
            <div class="flex-shrink-0 dropdown">
                <a href="#" class="btn btn-outline-light me-2">Logout</a>
        
            </div>
        </div>
    </nav>
    

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 mb-4">
                <a href="{{ route('notes.create') }}" class="btn btn-primary">Create Note</a>
            </div>
        </div>
        <div class="row">

            @foreach ($notes as $note)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
                                <img src="{{ asset('/storage/notes/' . $note->image) }}" class="rounded" style= " width: 150px;" alt="{{ $note->title }}">
                            </div>">
                            <h5 class="card-title">{{ $note->title }}</h5>
                            <p class="card-text">{{ html_entity_decode(Str::limit(strip_tags($note->body), 100)) }}</p>
                            <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('notes.show', $note->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                            <form action="{{ route('notes.destroy', $note->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>

</body>
</html>