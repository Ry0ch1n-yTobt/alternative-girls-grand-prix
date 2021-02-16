<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="スマホ美少女バトルRPG「オルタナティブガールズ2」（オルガル）のグランプリ対応キャラの検索と詳細表示">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>オルガル2 グランプリDB @yield('title')</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info static-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/' ) }}">オルガル2 グランプリDB</a>
        </div>
    </nav>
    <div id="wrapper">
        <div class="container">
            @yield('content')
        </div>
    </div>
    <footer class="container">
        <hr>
        <div>
            <div class="">公式サイト</div>
            <div><a href="https://lp.alterna.amebagames.com/">ホームページ</a></div>
            <div><a href="https://twitter.com/alterna_girls?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor">Twitter</a></div>
        </div>
        <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </footer>
    <div id="spinner" class="overlay is-hide">
        <div class="overlay__wrapper">
            <div class="overlay__spinner">
                <div class="d-flex justify-content-center">
                    <div class="spinner-grow text-primary spinner-size" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="pageTop"><a href="#"></a></div>
</body>
</html>
