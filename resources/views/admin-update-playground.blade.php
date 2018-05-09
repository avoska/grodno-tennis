<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Personal room</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/js/bootstrap.min.js">
    <link rel="stylesheet" type="text/css" href="/css/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="container-fluid shadow indent-10-percents">
    <div class="row text-center">
        <div class="col-xs-8 text-left">
            <a href="{{ route('admin_index') }}" class="btn navbar-btn margin-for-btn-in">
                <i class="far fa-caret-square-left" aria-hidden="true"></i> Назад
            </a>
        </div>
        <div class="col-xs-4">
            <div class="dropdown top-right-padding">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <img class="size-of-btn-img" src="/img/benefit_3.png">
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="{{ route('main') }}">Главная</a></li>
                    <li><a href="{{ route('personal-room') }}">Личный кабинет</a></li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                            Выход
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row text-center">
        <form method="post" action="{{ route('admin_update_post_playground') }}">
            {{ csrf_field() }}
            <div class="col-md-6 col-sm-6 text-left">
                <label for="address" class="second-section-textstyle"><strong>Адрес корта:<br></strong></label>
                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                    <input id="name" type="text" name="name" placeholder="Введите название турнира" value="" class="form-control input-box" required>
                    @if ($errors->has('address'))
                        <span class="help-block">
                                  <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                    @if (DB::table('playground')->where('address', 'address')->count()<1)
                        <span class="help-block">
                            <strong>Турнир не найден</strong>
                        </span>
                    @endif
                </div>
                <label for="worktime" class="second-section-textstyle"><strong>Время работы:<br></strong></label>
                <div class="form-group{{ $errors->has('worktime') ? ' has-error' : '' }}">
                    <input id="worktime" type="text" name="worktime" placeholder="Обязательное поле для ввода" value="{{DB::table('playground')->select('worktime')->where('address', 'address')->get()}}" class="form-control input-box" required maxlength="50">
                    @if ($errors->has('worktime'))
                        <span class="help-block">
                                  <strong>{{ $errors->first('worktime') }}</strong>
                              </span>
                    @endif
                </div>
                <label for="surface" class="second-section-textstyle"><strong>Покрытие корта:<br></strong></label>
                <div class="form-group{{ $errors->has('surface') ? ' has-error' : '' }}">
                    <input id="surface" type="text" name="surface" placeholder="Обязательное поле для ввода" class="form-control input-box" value="{{DB::table('playground')->select('surface')->where('address', 'address')->get()}}" required maxlength="50">
                    @if ($errors->has('surface'))
                        <span class="help-block">
                            <strong>{{ $errors->first('surface') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-md-6 col-sm-6 text-left">
                <label for="type" class="second-section-textstyle"><strong>Тип корта:<br></strong></label>
                <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                    <input id="type" type="text" name="type" placeholder="Обязательное поле для ввода" class="form-control input-box" value="{{DB::table('playground')->select('type')->where('address', 'address')->get()}}" required maxlength="50">
                    @if ($errors->has('type'))
                        <span class="help-block">
                            <strong>{{ $errors->first('type') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="row top-padding-1em">
                <div class="col-xs-12">
                    <div class="form-group">
                        <div class="card-panel text-center text-block">
                            <button type="submit" class="lt-primary-btn">
                                Изменить
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
