
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA INPUT DOSEN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">DATA INPUT DOSEN</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div style="width: 100%; min-height: 90vh;display: flex; justify-content: center; align-items; margin-top:4rem;">
        
       
        <form style="width: 70%;" method='post'>
            @csrf
            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                {{ session('error') }}
                
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="mb-3">
                <label for="id_dosen" class="form-label">Email</label>
                <input type="email" class="form-control" id="id_dosen" name='email' aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="id_matkul" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name='password' aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
           
            
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>