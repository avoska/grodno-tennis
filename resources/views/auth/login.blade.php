<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/js/bootstrap.min.js">
    <link rel="stylesheet" type="text/css" href="/css/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <title>Login</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <nav class="navbar navbar-default navbar-fixed-top">

            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand" href="/">
                <img class="logo-size" src="/img/liga_gray_logo.png">
            </a>


            <div class="navbar-right text-right">
                <a href="http://grodno-tennis/#registration" class="btn navbar-btn margin-for-btn-in blue-textstyle">
                    <i aria-hidden="true"></i>Регистрация
                </a>
            </div>


            <!-- /.container-fluid -->
        </nav>
    </div>
</div>
<div class="container-fluid indent-10-percents shadow">
    <div class="panel-heading second-section-textstyle top-padding-4em">Вход в личный кабинет</div>
    <div class="panel-body">
        <form method="get" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                         <strong>{{ $errors->first('email') }}</strong>
                     </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                        <input type="password" class="form-control" name="password" placeholder="Пароль" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                         <strong>{{ $errors->first('password') }}</strong>
                     </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-md-offset-4">
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            Запомнить
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group text-center">
                <div class="col-md-2 col-md-offset-4 col-xs-12 top-padding-1em">
                    <button type="submit" class="lt-primary-btn">
                        Войти
                    </button>
                </div>
                <div class="col-md-2 col-xs-12 top-padding-1em">
                    <a class="lt-primary-btn" href="{{ route('password.request') }}">
                        Забыли пароль?
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>