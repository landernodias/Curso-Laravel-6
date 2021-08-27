<!-- o tamplete aplica tudo aquilo que é comum dentro do sistema  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - EspecializaTI</title>

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