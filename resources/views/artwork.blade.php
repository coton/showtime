@extends('base')

@section('css')
    <style>
        *{margin:0;padding:0; }
        body{ background:#fafafa;}
        img{max-width: 100%;}
        .container{width:100%;margin:0;padding:0;}
        .artwork{width: 100%; text-align: center;}
        .banner{width: 100%; height:50px; background:#555555; opacity: 0.8; position: fixed; bottom: 0px; display: none;}
        .banner .like{margin: 15px 20px; color:#959595; float:left;}
        .banner .icon-like-f{display: none;}
        .banner .like span{position: relative; top: -3px; left: 5px;}
        .banner .logo{float: right; }
        .banner .logo img{position: relative; top:4px; width: 120px; right: 20px;}
    </style>
@endsection


@section('content')
    <div class="container" id="container">
        <div class="artwork">
            <img src="{{ $artwork->url }}" alt="{{ $artwork->name }}" data-md5="{{ $artwork->md5 }}" id="artwork">
        </div>
    </div>

    <div class="banner">
        <div class="like">
            <img src="{{ asset('images/icon-like.png') }}" alt="" id="icon-like">
            <img src="{{ asset('images/icon-like-f.png') }}" alt="" id="icon-like-f" class="icon-like-f">
            <span id="like-count">{{ $likecount }}</span>
        </div>
        <div class="logo"><a href="/"><img src="{{ asset('images/logo.png') }}" alt=""></a></div>
    </div>

    </div>
@endsection

@section('js')
    <script src="{{ elixir('js/artwork.js') }}"></script>
@endsection

@section('wechatshare')
    <script language="javascript">
        wx.ready(function () {

            wx.onMenuShareTimeline({
                title: '{{ trans('wechat.artwork_share_moment_title') }}',
                link: '{{ URL::current() }}',
                imgUrl: '{{ asset('images/share-icon.png') }}',
                success: function () {
                    ShowTimeStatistic.wechat('artwork', '{{ $artwork->md5 }}', 'share-timeline');
                },
                cancel: function () {
                }
            });
            wx.onMenuShareAppMessage({
                title: '{{ trans('wechat.artwork_share_title') }}',
                desc: '{{ trans('wechat.artwork_share_desc') }}',
                link: '{{ URL::current() }}',
                imgUrl: '{{ asset('images/share-icon.png') }}',
                success: function () {
                    ShowTimeStatistic.wechat('artwork', '{{ $artwork->md5 }}', 'share-appmessage');
                },
                cancel: function () {

                }
            });
            wx.onMenuShareQQ({
                title: '{{ trans('wechat.artwork_share_title') }}',
                desc: '{{ trans('wechat.artwork_share_desc') }}',
                link: '{{ URL::current() }}',
                imgUrl: '{{ asset('images/share-icon.png') }}',
                success: function () {
                    ShowTimeStatistic.wechat('artwork', '{{ $artwork->md5 }}', 'share-qq');
                },
                cancel: function () {
                }
            });
            wx.onMenuShareWeibo({
                title: '{{ trans('wechat.artwork_share_title') }}',
                desc: '{{ trans('wechat.artwork_share_desc') }}',
                link: '{{ URL::current() }}',
                imgUrl: '{{ asset('images/share-icon.png') }}',
                success: function () {
                    ShowTimeStatistic.wechat('artwork', '{{ $artwork->md5 }}', 'share-weibo');
                },
                cancel: function () {
                }
            });

        });
    </script>
@endsection
