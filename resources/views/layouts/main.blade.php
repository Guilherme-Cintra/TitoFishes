<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

        <!-- Bootstrap -->

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
       
        <!-- CSS -->
     
        <link rel="stylesheet" href="/css/styles.css">

        <!-- JS -->
        <script src="/js/script.js"></script>
      
    </head>
    <body class="antialiased">
       <header class ="header">
        <h2 class="logo">Tito Fishes</h2>
            <nav class="navbar">
                <a href="#">Home</a>
                <a href="#fishes">Our Fishes</a>
                <a href="#new">New Fishes</a>
                <a href="#about">About Us</a>
                <a href="#contact">Contact</a>
                <a href="/admin/addfish">addfish</a>
            </nav>
        </a>
       </header>
    
   
    @yield('content')

    <footer>
        <p>Tito Fishes &copy; 2024</p>
    </footer>
    </body>
</html>
