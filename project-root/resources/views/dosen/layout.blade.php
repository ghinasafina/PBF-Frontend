<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Dosen</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
        }
        
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 250px;
            background-color: #343a40;
            padding-top: 1rem;
            overflow-y: auto;
        }
        
        .sidebar a {
            color: #ffffff;
            padding: 10px 20px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .main-content {
            margin-left: 250px; 
            padding: 1rem;
            flex-grow: 1;
        }
        
    </style>
</head>
<body>
    
    <div class="sidebar p-sticky">
        <h4 class="text-center text-white">Menu Dosen</h4>
        
        <a href="/display-dosen">Data Dosen</a>
        <a href="/nilai-mahasiswa">Nilai Mahasiswa</a>
        <a href="/matkul-dosen">Mata Kuliah</a>
        <a href="/" class="text-danger">Logout</a>
    </div>
    
    <div class="main-content">
        @yield('content')
    </div>
    
</body>
</html>
