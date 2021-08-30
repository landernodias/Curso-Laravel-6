<!-- o tamplete aplica tudo aquilo que é comum dentro do sistema  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - EspecializaTI</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    
    @stack('styles')
</head>
<body>
    <div class="container">
        <!-- definindo que é um tamplate -->
        @yield('content') <!--define a diretiva e nomeia o template -->
    </div>
    
    @stack('scripts')
</body>
</html>