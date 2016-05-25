<!doctype html>
<html class="no-js" lang="zh">
<head>
    <meta charset="utf-8">
    <title>SHOWTIME秀台</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        *{margin:0;padding:0; }
        .container{width:100%;margin:0;padding:0; background:#fafafa;}
        .artwork{width: 100%; text-align: center;}
        .banner{width: 100%; height:50px; background:#555555; opacity: 0.8; position: fixed; bottom: 0px;}
        .banner .like{margin: 15px 20px; color:#959595; float:left;}
        .banner .like span{position: relative; top: -3px; left: 5px;}
        .banner .logo{float: right; }
        .banner .logo img{position: relative; top:4px; width: 120px; right: 20px;}
    </style>
</head>
<body>
<!--[if lt IE 10]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="container" id="container">
    <div class="artwork">
        <img src="{{ $artwork->url }}" alt="{{ $artwork->name }}" data-md5="$artwork->md5" id="artwork">
    </div>
</div>

<div class="banner">
    <div class="like"><img src="{{ asset('images/icon-like.png') }}" alt="" id="btn-like">
        <span>{{ $likecount }}</span>
    </div>
    <div class="logo"><a href="/"><img src="{{ asset('images/logo.png') }}" alt=""></a></div>
</div>

</div>
</body>
</html>
