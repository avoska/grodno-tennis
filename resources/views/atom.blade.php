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
    <title>Atoms</title>
</head>
<body>

<div class="container-fluid indent-10-percents shadow">

    <div class="row">
        <div class="col-xs-6">
            <h1>Font</h1>
            <span class="lt-font"></span>
            <h1 class="lt-h1">H1 TEXT</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6">
            <h1>Buttons</h1>
            <button type="button" class="lt-primary-btn">Primary</button>
            <button type="button" class="lt-default-btn">Default</button>
            <button type="button" class="lt-success-btn">Success</button>
            <button type="button" class="lt-warning-btn">Warning</button>
            <button type="button" class="lt-danger-btn">Danger</button>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6">
            <h1>Dropdown Button With Image</h1>
            <div class="dropdown">
                <button class="dropbtn">
                    <img class="size-of-btn-img" src="/img/benefit_3.png">
                    <span class="caret"></span>
                </button>
                <div class="dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>
            </div>
        </div>
    </div>

    <!--	<div class="container-fluid">
            <div class="row">
                <div class="col-xs-2">
                    <div class="collapsible-menu">
                        <input type="checkbox" id="menu">
                        <label for="menu">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </label>
                        <div class="menu-content">
                            <ul>
                                <li><a href="#"></a>Home</li>
                                <li><a href="#"></a>Services</li>
                                <li><a href="#"></a>Projects</li>
                                <li><a href="#"></a>About</li>
                                <li><a href="#"></a>Blog</li>
                                <li><a href="#"></a>Contacts</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    !-->

    <div class="row">
        <div class="container-fluid">
            <div class="row nav-style">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle nav-btn" data-toggle="collapse" data-target="#myNav">
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="myNav">
                    <ul class="nav text-center">
                        <li class="col-xs-offset-1 col-xs-2  hidden-xs"><a>Link 0</a></li>
                        <li class="col-xs-2 hidden-xs"><a>Link 1</a></li>
                        <li class="col-xs-2 hidden-xs"><a>Link 2</a></li>
                        <li class="col-xs-2 hidden-xs"><a>Link 3</a></li>
                        <li class="col-xs-2 hidden-xs"><a>Link 4</a></li>
                    </ul>
                    <ul class="nav text-left visible-xs">
                        <li class="col-xs-12"><a>Link 0</a></li>
                        <li class="col-xs-12"><a>Link 1</a></li>
                        <li class="col-xs-12"><a>Link 2</a></li>
                        <li class="col-xs-12"><a>Link 3</a></li>
                        <li class="col-xs-12"><a>Link 4</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <h1>Navbar</h1>
        <nav class="navbar navbar-default  nav-style">
            <div class="container-fluid">
                <div class="row">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav text-center hidden-xs">
                            <li class="col-xs-offset-1 col-xs-2"><a>Link 0</a></li>
                            <li class="col-xs-2"><a>Link 1</a></li>
                            <li class="col-xs-2"><a>Link 2</a></li>
                            <li class="col-xs-2"><a>Link 3</a></li>
                            <li class="col-xs-2"><a>Link 4</a></li>
                        </ul>
                        <ul class="nav text-left visible-xs">
                            <li class="col-xs-12"><a>Link 0</a></li>
                            <li class="col-xs-12"><a>Link 1</a></li>
                            <li class="col-xs-12"><a>Link 2</a></li>
                            <li class="col-xs-12"><a>Link 3</a></li>
                            <li class="col-xs-12"><a>Link 4</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <table width="100%" class=" table-background">
                <thead>
                <tr>
                    <td class="text-center personal-room-table-style">
                        <span class="hidden-xs">Время игры</span>
                        <span class="visible-xs-block">
								<i class="glyphicon glyphicon-time" aria-hidden="true"></i>
							</span>
                    </td>
                    <td class="text-center personal-room-table-style">
                        <span class="hidden-xs">Дата игры</span>
                        <span class="visible-xs-block">
								<i class="glyphicon glyphicon-calendar" aria-hidden="true"></i>
							</span>
                    </td>
                    <td class="text-center personal-room-table-style">Режим</td>
                    <td class="text-center personal-room-table-style">
                        <span class="hidden-xs">Спаринг партнёр</span>
                        <span class="visible-xs-block">
                  <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
							</span>
                    </td>
                    <td class="text-center personal-room-table-style">
                        <span class="hidden-xs">Результат игры</span>
                        <span class="visible-xs-block">
								<i class="glyphicon glyphicon-th-list" aria-hidden="true"></i>
							</span>
                    </td>
                    <td class="text-center personal-room-table-style">
                        <span class="hidden-xs">Полученные очки</span>
                        <span class="visible-xs-block">
								<i class="	glyphicon glyphicon-stats" aria-hidden="true"></i>
							</span>
                    </td>
                </tr>
                </thead>
                <tbody>
                <tr class="text-center">
                    <td class="text-center personal-room-table-style">15:00</td>
                    <td class="text-center personal-room-table-style">12.05.2018</td>
                    <td class="text-center personal-room-table-style">1v1</td>
                    <td class="text-center personal-room-table-style">Прокопенко Иван Васильевич</td>
                    <td class="text-center personal-room-table-style"></td>
                    <td class="text-center personal-room-table-style">11</td>
                </tr>
                <tr class="text-center">
                    <td class="text-center personal-room-table-style">15:00</td>
                    <td class="text-center personal-room-table-style">12.05.2018</td>
                    <td class="text-center personal-room-table-style">1v1</td>
                    <td class="text-center personal-room-table-style">Прокопенко Иван Васильевич</td>
                    <td class="text-center personal-room-table-style"></td>
                    <td class="text-center personal-room-table-style">11</td>
                </tr>
                <tr class="text-center">
                    <td class="text-center personal-room-table-style">15:00</td>
                    <td class="text-center personal-room-table-style">12.05.2018</td>
                    <td class="text-center personal-room-table-style">1v1</td>
                    <td class="text-center personal-room-table-style">Прокопенко Иван Васильевич</td>
                    <td class="text-center personal-room-table-style"></td>
                    <td class="text-center personal-room-table-style">11</td>
                </tr>
                <tr class="text-center">
                    <td class="text-center personal-room-table-style">15:00</td>
                    <td class="text-center personal-room-table-style">12.05.2018</td>
                    <td class="text-center personal-room-table-style">1v1</td>
                    <td class="text-center personal-room-table-style">Прокопенко Иван Васильевич</td>
                    <td class="text-center personal-room-table-style"></td>
                    <td class="text-center personal-room-table-style">11</td>
                </tr>
                <tr class="text-center">
                    <td class="text-center personal-room-table-style">15:00</td>
                    <td class="text-center personal-room-table-style">12.05.2018</td>
                    <td class="text-center personal-room-table-style">1v1</td>
                    <td class="text-center personal-room-table-style">Прокопенко Иван Васильевич</td>
                    <td class="text-center personal-room-table-style"></td>
                    <td class="text-center personal-room-table-style">11</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6">
            <p class="second-section-textstyle"><strong>Ваше имя:<br></strong>
                <input type="text" size="37" class="input-box">
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6">
            <p class="second-section-textstyle"><strong>О себе:<Br></strong>
                <textarea name="comment" cols="38" rows="5" class="about-yourself"></textarea>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6">
            <img src="/img/federer_avatar.png" class="size-of-img-in-personal-room">
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <h1>Форма результатов матча</h1>
            <form class="form-horizontal shadow">
                <div class="form-group">
                    <div class="row pvp-form-textstyle">
                        <div class="col-xs-12 text-left">
                            <img src="/img/federer_avatar.png" class="size-of-img-in-form-pvp">
                            <label>Мефедродий</label>
                            <label>Карапритонисиодинидзе</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-4 text-center">
                            <img src="/img/federer_avatar.png" class="size-of-img-in-form-pvp">
                        </div>
                        <div class="col-xs-8 text-left pvp-form-textstyle">
                            <label>Мефедродий Карапритонисиодинидзе</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-offset-5 col-xs-2 text-center pvp-form-textstyle">
                            <label>5:8</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-8 text-right pvp-form-textstyle">
                            <label>Мефедродий Карапритонисиодинидзе</label>
                        </div>
                        <div class="col-xs-4 text-center">
                            <img src="/img/federer_avatar.png" class="size-of-img-in-form-pvp">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row top-padding-1em indent-10-percents">
    <div class="col-xs-12 results-league-table">
        <table width="100%" class="text-center">
            <thead>
            <tr>
                <td>
                </td>
                <td>
                    <span class="hidden-xs">Игрок</span>
                    <span class="visible-xs-block">
                        <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
                    </span>
                </td>
                <td>
                    <span class="hidden-xs">Возраст</span>
                    <span class="visible-xs-block">
                        <i class="" aria-hidden="true"> </i>
                    </span>
                </td>
                <td>
                    <span class="hidden-xs">Сыграно</span>
                    <span class="visible-xs-block">
                        <i class="glyphicon glyphicon-th-list" aria-hidden="true"></i>
                    </span>
                </td>
                <td>
                    <span class="hidden-xs">Побед</span>
                    <span class="visible-xs-block">
                        <i class="glyphicon glyphicon-th-list" aria-hidden="true"></i>
                    </span>
                </td>
                <td>
                    <span class="hidden-xs">Очки</span>
                    <span class="visible-xs-block">
                        <i class="glyphicon glyphicon-stats" aria-hidden="true"></i>
                    </span>
                </td>
            </tr>
            </thead>
            <tbody>
            @foreach ($users->where('age','>=','21') as $user)
                <tr class="text-center">
                    <td>
                        <img class="player-avatar-32 border" src="/uploads/avatars/{{ $user->avatar }}">
                    </td>
                    <td>{{ $user->surname }} {{ $user->name }} {{ $user->sname }}</td>
                    <td>{{ $user->age }}</td>
                    <td>{{ $user->matches }}</td>
                    <td>{{ $user->wins }}</td>
                    <td>{{ $user->rating }}</td>
                </tr>
            @endforeach
            </tbody>

        </table>
        <hr>
        {{$users->render()}}
    </div>
</div>
<div class="container-fluid">
    <div class="row top-padding-1em">
        <h1>Табы для приглашений и просмотра игроков</h1>
        <nav class="navbar navbar-default  nav-style">
            <div class="container-fluid">
                <div class="row">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#tabNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="tabNavbar">
                        <ul class="nav text-center hidden-xs">
                            <li class="col-xs-offset-1 col-xs-2"><a id="defaultOpen" onclick="openTab(event, 'my_matches')">Матчи</a></li>
                            <li class="col-xs-2"><a onclick="openTab(event, 'players')">Игроки</a></li>
                            <li class="col-xs-2"><a onclick="openTab(event, 'invites')">Приглашения</a></li>
                            <li class="col-xs-2"><a onclick="openTab(event, 'my_data')">Личные данные</a></li>
                            <li class="col-xs-2"><a>Link 4</a></li>
                        </ul>
                        <ul class="nav text-left visible-xs">
                            <li class="col-xs-12"><a onclick="openTab(event, 'my_matches')">Матчи</a></li>
                            <li class="col-xs-12"><a onclick="openTab(event, 'players')">Игроки</a></li>
                            <li class="col-xs-12"><a onclick="openTab(event, 'invites')">Приглашения</a></li>
                            <li class="col-xs-12"><a onclick="openTab(event, 'my_data')">Личные данные</a></li>
                            <li class="col-xs-12"><a>Link 4</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="row top-padding-1em">
        <div class="col-xs-12">

            <!--   <div class="tab">
                   <button class="lt-primary-btn" id="defaultOpen" onclick="openTab(event, 'my_matches')">Матчи</button>
                   <button class="lt-primary-btn" onclick="openTab(event, 'players')">Игроки</button>
                   <button class="lt-primary-btn" onclick="openTab(event, 'invites')">Приглашения</button>
                   <button class="lt-primary-btn" onclick="openTab(event, 'my_data')">Личные данные</button>
               </div>
           !-->
            <div id="my_matches" class="tabcontent">
                <h3>Мои матчи:</h3>
                <div class="row">
                    <div class="col-xs-12">
                        <table width="100%" class=" table-background">
                            <thead>
                            <tr>
                                <td class="text-center personal-room-table-style">
                                    <span class="hidden-xs">Время игры</span>
                                    <span class="visible-xs-block">
        								<i class="glyphicon glyphicon-time" aria-hidden="true"></i>
        							</span>
                                </td>
                                <td class="text-center personal-room-table-style">
                                    <span class="hidden-xs">Дата игры</span>
                                    <span class="visible-xs-block">
        								<i class="glyphicon glyphicon-calendar" aria-hidden="true"></i>
        							</span>
                                </td>
                                <td class="text-center personal-room-table-style">Режим</td>
                                <td class="text-center personal-room-table-style">
                                    <span class="hidden-xs">Спаринг партнёр</span>
                                    <span class="visible-xs-block">
                          <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
        							</span>
                                </td>
                                <td class="text-center personal-room-table-style">
                                    <span class="hidden-xs">Результат игры</span>
                                    <span class="visible-xs-block">
        								<i class="glyphicon glyphicon-th-list" aria-hidden="true"></i>
        							</span>
                                </td>
                                <td class="text-center personal-room-table-style">
                                    <span class="hidden-xs">Полученные очки</span>
                                    <span class="visible-xs-block">
        								<i class="	glyphicon glyphicon-stats" aria-hidden="true"></i>
        							</span>
                                </td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="text-center">
                                <td class="text-center personal-room-table-style">15:00</td>
                                <td class="text-center personal-room-table-style">12.05.2018</td>
                                <td class="text-center personal-room-table-style">1v1</td>
                                <td class="text-center personal-room-table-style">Прокопенко Иван Васильевич</td>
                                <td class="text-center personal-room-table-style"></td>
                                <td class="text-center personal-room-table-style">11</td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-center personal-room-table-style">15:00</td>
                                <td class="text-center personal-room-table-style">12.05.2018</td>
                                <td class="text-center personal-room-table-style">1v1</td>
                                <td class="text-center personal-room-table-style">Прокопенко Иван Васильевич</td>
                                <td class="text-center personal-room-table-style"></td>
                                <td class="text-center personal-room-table-style">11</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div id="players" class="tabcontent">
                <h3>Все игроки:</h3>
                <div class="row top-padding-1em">
                    <div class="col-xs-12 results-league-table">
                        <table width="100%" class="text-center">
                            <thead>
                            <tr>
                                <td>
                                </td>
                                <td>
                                    <span class="hidden-xs">Игрок</span>
                                    <span class="visible-xs-block">
                                        <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
                                    </span>
                                </td>
                                <td>
                                    <span class="hidden-xs">Возраст</span>
                                    <span class="visible-xs-block">
                                        <i class="" aria-hidden="true"> </i>
                                    </span>
                                </td>
                                <td>
                                    <span class="hidden-xs">Сыграно</span>
                                    <span class="visible-xs-block">
                                        <i class="glyphicon glyphicon-th-list" aria-hidden="true"></i>
                                    </span>
                                </td>
                                <td>
                                    <span class="hidden-xs">Побед</span>
                                    <span class="visible-xs-block">
                                        <i class="glyphicon glyphicon-th-list" aria-hidden="true"></i>
                                    </span>
                                </td>
                                <td>
                                    <span class="hidden-xs">Очки</span>
                                    <span class="visible-xs-block">
                                        <i class="glyphicon glyphicon-stats" aria-hidden="true"></i>
                                    </span>
                                </td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users->where('age','>=','21') as $user)
                                <tr class="text-center">
                                    <td>
                                        <img class="player-avatar-32 border" src="/uploads/avatars/{{ $user->avatar }}">
                                    </td>
                                    <td>{{ $user->surname }} {{ $user->name }} {{ $user->sname }}</td>
                                    <td>{{ $user->age }}</td>
                                    <td>{{ $user->matches }}</td>
                                    <td>{{ $user->wins }}</td>
                                    <td>{{ $user->rating }}</td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        <hr>
                        {{$users->render()}}
                    </div>
                </div>
            </div>

            <div id="invites" class="tabcontent">
                <h3>Приглашения на матчи:</h3>
                <div class="row top-padding-1em">
                    <div class="col-xs-12">
                        <table width="100%" class="text-center">
                            <thead>
                            <tr>
                                <td>
                                    <span class="hidden-xs personal-room-request-table-style">Вас приглашает:</span>
                                    <span class="visible-xs-block">
                                        <i class="glyphicon glyphicon-user personal-room-request-table-style" aria-hidden="true"></i>
                                    </span>
                                </td>
                                <td>
                                    <span class="hidden-xs personal-room-request-table-style">Дата:</span>
                                </td>
                                <td>
                                    <span class="hidden-xs personal-room-request-table-style">Время:</span>
                                </td>
                                <td>
                                    <span class="hidden-xs personal-room-request-table-style">Корт:</span>
                                </td>
                                <td>
                                    <span>

                                    </span>
                                </td>
                                <td>
                                    <span>

                                    </span>
                                </td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                               <!-- ($wait_requests as $wait_request)
                               !-->
                                <tr class="text-center top-padding-1em">
                                    <td class="top-padding-1em personal-room-request-table-style">{{ $user->surname }} {{ $user->name }} {{ $user->sname }}</td>
                                    <td class="top-padding-1em hidden-xs personal-room-request-table-style">{{ $user->created_at }}</td>
                                    <td class="top-padding-1em hidden-xs personal-room-request-table-style">16:00</td>
                                    <td class="top-padding-1em visible-xs personal-room-request-table-style">{{ $user->created_at }} 16:00</td>
                                    <td class="top-padding-1em personal-room-request-table-style">ул. Петровича д.42</td>
                                    <td class="top-padding-1em hidden-xs personal-room-request-table-style"><button class="lt-success-btn" onclick="addMatch(event, 'a')">Принять</button></td>
                                    <td class="top-padding-1em visible-xs personal-room-request-table-style"><button class="lt-success-btn" onclick="addMatch(event, 'a')"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i></button></td>
                                    <td class="top-padding-1em hidden-xs personal-room-request-table-style"><button class="lt-danger-btn" onclick="deleteRequest(event, 2)">Отклонить</button></td>
                                    <td class="top-padding-1em visible-xs personal-room-request-table-style"><button class="lt-danger-btn" onclick="deleteRequest(event, 2)"><i class="glyphicon glyphicon-minus" aria-hidden="true"></i></button></td>

                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        <hr>
                        {{$users->render()}}
                    </div>
                </div>



            </div>

            <div id="my_data" class="tabcontent">
                <h3>Личные данные:</h3>
                <div class="row top-padding-1em">
                    <form method="post" action="{{ route('updateUsers') }}">
                        {{ csrf_field() }}

                        <div class="col-lg-3 col-sm-3 col-md-2 col-xs-4">
                            <img src="/uploads/avatars/yan.jpg" class="size-of-img-in-personal-room">
                            <div class="form-group">
                                <input type="file" name="avatar" id="avatar">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-9 col-md-10 col-xs-8 text-left">
                            <label for="name" class="second-section-textstyle"><strong>Имя:<br></strong></label>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <input id="name" type="text" name="name" placeholder="Обязательное поле для ввода" value="Yan" class="form-control input-box" required>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                                @endif
                            </div>
                            <label for="surname" class="second-section-textstyle"><strong>Фамилия:<br></strong></label>
                            <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                                <input id="surname" type="text" name="surname" placeholder="Обязательное поле для ввода" value="Malanenko" class="form-control input-box" required maxlength="50">
                                @if ($errors->has('surname'))
                                    <span class="help-block">
                                      <strong>{{ $errors->first('surname') }}</strong>
                                  </span>
                                @endif
                            </div>
                            <label for="sname" class="second-section-textstyle"><strong>Отчество:<br></strong></label>
                            <div class="form-group{{ $errors->has('sname') ? ' has-error' : '' }}">
                                <input id="sname" type="text" name="sname" placeholder="Обязательное поле для ввода" class="form-control input-box" value="Sergeevich" required maxlength="50">
                                @if ($errors->has('sname'))
                                    <span class="help-block">
                                      <strong>{{ $errors->first('sname') }}</strong>
                                  </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-9 col-md-10 col-xs-12 text-left">
                            <label for="email" class="second-section-textstyle"><strong>E-mail:<br></strong></label>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" name="email" placeholder="Обязательное поле для ввода" class="form-control input-box" value="yan@mail.ru" required maxlength="50" readonly>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                                @endif
                            </div>
                            <label for="age" class="second-section-textstyle"><strong>Возраст:<br></strong></label>
                            <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
                                <input id="age" type="text" name="age" placeholder="Обязательное поле для ввода" value="21" class="form-control input-box" required maxlength="3">
                                @if ($errors->has('age'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label for="phone" class="second-section-textstyle"><strong>Телефон<br></strong></label>
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <input id="phone" type="text" name="phone" value="+375442280288" class="form-control input-box" maxlength="50">
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                      <strong>{{ $errors->first('phone') }}</strong>
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

            <script>
				function openTab(evt, tabName) {
					var i, tabcontent, tablinks;
					tabcontent = document.getElementsByClassName("tabcontent");
					for(i = 0; i < tabcontent.length; i++) {
						tabcontent[i].style.display = "none";
					}
					tablinks = document.getElementsByClassName("tablinks");
					for(i = 0; i < tablinks.length; i++) {
						tablinks[i].className = tablinks[i].className.replace(" active", "");
					}
					document.getElementById(tabName).style.display = "block";
					evt.currentTarget.className += " active";
				}

				document.getElementById("defaultOpen").click();
            </script>
        </div>
    </div>
</div>
</body>
</html>