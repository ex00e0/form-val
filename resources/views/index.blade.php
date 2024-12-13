<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{asset('js/script.js')}}" defer></script>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="{{ route('signup') }}" method="POST">
                @csrf
                <h1>Регистрация</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>или создайте аккаунт</span>
                <input name="name" type="text" placeholder="Имя" />
                @error('name')
                    <script>
                        container.classList.add("right-panel-active");
                    </script>
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input name="email" type="email" placeholder="Email" />
                @error('email')
                    <script>
                        container.classList.add("right-panel-active");
                    </script>
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input name="password" type="password" placeholder="Пароль" />
                @error('password')
                    <script>
                        container.classList.add("right-panel-active");
                    </script>
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button>Создать аккаунт</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="{{ route('signin') }}" method="POST">
                @csrf
                <h1>Вход</h1>
                
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>или войдите со своего аккаунта</span>
                <input name="email_l" type="email" placeholder="Email" />
                @error('email_l')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input name="password_l" type="password" placeholder="Пароль" />
                @error('password_l')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @error('message')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button>Войти</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>С возвращением!</h1>
                    <p>Чтобы поддерживать с нами связь, пожалуйста, войдите в систему, указав свои личные данные</p>
                    <button class="ghost" id="signIn">Вход</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Привет, друг!</h1>
                    <p>Введите свои личные данные и отправляйтесь в путешествие вместе с нами</p>
                    <button class="ghost" id="signUp">Зарегистрироваться</button>
                </div>
            </div>
        </div>
    </div>

    <footer>

    </footer>
</body>

</html>