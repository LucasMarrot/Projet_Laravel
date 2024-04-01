<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>

    <div class="container">
        @if (session('success'))
            <div>
                {{session('sucess')}}
            </div>  
        @endif
        
        @yield('content')
    </div>
    
</body>
</html>