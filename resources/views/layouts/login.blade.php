<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<html lang="ja">
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title>Atlas</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('/js/script.js') }}"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>

    <!--OGPタグ/twitterカード-->

<body>

    <header>
        <div id = "head">
        <h1><a href="{{URL::to('/top')}}"><img src="{{asset('images/atlas.png')}}" alt="Atlas"></a></h1>
        </div>
            <nav id="g-navi">
                <div class="accordion-container">
                    <p class="accordion-title">
                        <?php $user = Auth::user(); ?>{{ $user->username }} さん <img src="{{$user->icon}}" alt="アイコン"></p>
                <ul>
                    <!--/〇〇に遷移する-->
                    <li><a href="/top">ホーム</a></li>
                    <li><a href="/profile">プロフィール</a></li>
                    <li><a href="/logout">ログアウト</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>〇〇さんの</p>
                <div>
                <p>フォロー数</p>
                <p>〇〇名</p>
                </div>
                <!--/〇〇に遷移する-->
                <p class="btn"><a href="/follow-list">フォローリスト</a></p>
                <div>
                <p>フォロワー数</p>
                <p>〇〇名</p>
                </div>
                <p class="btn"><a href="/follower-list">フォロワーリスト</a></p>
            </div>
            <p class="btn"><a href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
</body>
</html>
