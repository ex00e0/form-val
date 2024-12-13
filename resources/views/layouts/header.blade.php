<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="{{route('index')}}">Чистый дом</a>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
         @auth
         <li class="nav-item">
          <a class="nav-link" href="{{route('appl')}}">Мои заявки</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('show_appl')}}">Подать заявку</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('exit')}}">Выход</a>
        </li>
        @endauth
        @guest
        <li class="nav-item">
          <a class="nav-link" href="{{route('index')}}">Вход</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('show_reg')}}">Регистрация</a>
        </li>
        @endguest
      </ul>
     
    </div>
  </div>
</nav>

@yield('content')

</body>
</html>