<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>CBT APP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">

</head>

<body>
    <header class="mb-4">
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <a class="navbar-brand fw-bold ml-5" href="/columns">CBT APP</a>

            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="nav-bar">
                <ul class="navbar-nav mr-auto"></ul>
                <ul class="navbar-nav">
                    @if(Auth::check())

                    <p>ID {!! $id = Auth::user()->id; !!} 番 {!! $name = Auth::user()->name; !!} さん</p>

                    <li class="nav-item">{!! link_to_route('columns.create', '新規コラムの作成', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('columns.index', 'コラム一覧', [], ['class' => 'nav-link']) !!}</li>

                    <div class="dropdown mr-5">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            アカウント
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li>{!! link_to_route('logout.get', 'ログアウト', [], ['class' => 'nav-link']) !!}</li>
                            <li>{!! link_to_route('users.delete_confirm', '退会', [], ['class' => 'nav-link']) !!}</li>   
                        </ul>
                    </div>

                    @else

                    <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('signup.get', '会員登録', [], ['class' => 'nav-link']) !!}</li>

                    @endif
                </ul>
            </div>
        </nav>
    </header>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    <script type="text/javascript" src="main.js"></script>
</body>

</html>