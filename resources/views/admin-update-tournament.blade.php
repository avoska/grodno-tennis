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
                <label for="name" class="second-section-textstyle"><strong>Название турнира:<br></strong></label>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <input id="name" type="text" name="name" placeholder="Введите название турнира" value="" class="form-control input-box" required>
                    @if ($errors->has('name'))
                        <span class="help-block">
                                  <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                    @if (DB::table('tournament')->where('name', 'name')->count()<1)
                        <span class="help-block">
                                  <strong>Турнир не найден</strong>
                        </span>
                    @endif
                </div>
                <label for="date_of_start" class="second-section-textstyle"><strong>Дата начала:<br></strong></label>
                <div class="form-group{{ $errors->has('date_of_start') ? ' has-error' : '' }}">
                    <input id="date_of_start" type="text" name="date_of_start" placeholder="Обязательное поле для ввода" value="{{DB::table('tournament')->select('date_of_start')->where('name', 'name')->get()}}" class="form-control input-box" required maxlength="50">
                    @if ($errors->has('date_of_start'))
                        <span class="help-block">
                                  <strong>{{ $errors->first('date_of_start') }}</strong>
                              </span>
                    @endif
                </div>
                <label for="date_of_finish" class="second-section-textstyle"><strong>Дата окончания:<br></strong></label>
                <div class="form-group{{ $errors->has('date_of_finish') ? ' has-error' : '' }}">
                    <input id="date_of_finish" type="text" name="date_of_finish" placeholder="Обязательное поле для ввода" class="form-control input-box" value="{{DB::table('tournament')->select('date_of_finish')->where('name', 'name')->get()}}" required maxlength="50">
                    @if ($errors->has('date_of_finish'))
                        <span class="help-block">
                                  <strong>{{ $errors->first('date_of_finish') }}</strong>
                              </span>
                    @endif
                </div>
            </div>
            <div class="col-md-6 col-sm-6 text-left">
                <label for="time" class="second-section-textstyle"><strong>Время:<br></strong></label>
                <div class="form-group{{ $errors->has('time') ? ' has-error' : '' }}">
                    <input id="time" type="text" name="time" placeholder="Обязательное поле для ввода" class="form-control input-box" value="{{DB::table('tournament')->select('time')->where('name', 'name')->get()}}" required maxlength="50">
                    @if ($errors->has('time'))
                        <span class="help-block">
                                  <strong>{{ $errors->first('time') }}</strong>
                        </span>
                    @endif
                </div>
                <label for="playground_id" class="second-section-textstyle"><strong>ID корта:<br></strong></label>
                <div class="form-group{{ $errors->has('playground_id') ? ' has-error' : '' }}">
                    <input id="playground_id" type="text" name="playground_id" placeholder="Обязательное поле для ввода" value="{{DB::table('tournament')->select('playground_id')->where('name', 'name')->get()}}" class="form-control input-box" required maxlength="3">
                    @if ($errors->has('playground_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('playground_id') }}</strong>
                        </span>
                    @endif
                </div>
                <label for="max_players" class="second-section-textstyle"><strong>Максимальное кол-во игроков:<br></strong></label>
                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                    <input id="max_players" type="text" name="max_players" value="{{DB::table('tournament')->select('max_players')->where('name', 'name')->get()}}" class="form-control input-box" maxlength="50" required>
                    @if ($errors->has('max_players'))
                        <span class="help-block">
                                  <strong>{{ $errors->first('max_players') }}</strong>
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
