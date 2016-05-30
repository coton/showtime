@extends('base')

@section('css')
    <link rel="stylesheet" href="{{ elixir('css/vendor-artworklist.css') }}">
    <style>
        *{margin:0;padding:0; }
        body{ background:#fafafa;}
        .container{width:100%; text-align: center;}

        .artwork{width:320px; height: 620px; float: left; background-repeat: no-repeat; background-size: cover; margin: 25px 50px; }
        .artwork .screen{width:310px;height:550px; overflow:scroll; color: #f2f2f2; border: 5px solid #e1e1e1;}
        .artwork .screen::-webkit-scrollbar { display: none;}
        .artwork .screen img{max-width: 100%; }

        .paginationwrap{clear: both;}

        @media (max-width:768px){
            .artwork{margin:25px; float: none;}
        }

        .tool-bar{margin-top:10px;}
        .qrcode{width: 220px;  height: 220px;  padding-bottom:50px;  border: 10px solid #fafafa;  background: #fafafa;position: relative;  top: -280px;  left: 45px; display: none;}

    </style>
@endsection

@section('content')

    <div class="container">

        @foreach ($artworks as $artwork)
            <div class="artwork">
                <div class="screen">
                    <img id="artimg" src="{{ $artwork->url }}" alt="">
                </div>

                <div class="tool-bar">
                    <button type="button" class="btn btn-default btn-qrcode" data-artwork="{{ $artwork->md5 }}">QR Code</button>
                </div>

                <div class="qrcode" id="{{$artwork->md5}}" data-qrurl="{{ url('/artwork/') }}/{{ $artwork->md5 }}"></div>

            </div>
        @endforeach

        <div class="paginationwrap">
            {!! $artworks->render() !!}
        </div>

    </div>
@endsection

@section('js')
    <script src="{{ elixir('js/vendor-artworklist.js') }}"></script>
    <script src="{{ elixir('js/artworklist.js') }}"></script>
@endsection

@section('wechatshare')
    <script language="javascript">
        wx.ready(function () {

            wx.onMenuShareTimeline({
                title: '{{ trans('wechat.artwork_share_moment_title') }}',
                link: '{{ URL::current() }}',
                imgUrl: '{{ asset('images/share-icon.png') }}',
                success: function () {
                    ShowTimeStatistic.wechat('artworklist', '{{ $artwork->md5 }}', 'share-timeline');
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
                    ShowTimeStatistic.wechat('artworklist', '{{ $artwork->md5 }}', 'share-appmessage');
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
                    ShowTimeStatistic.wechat('artworklist', '{{ $artwork->md5 }}', 'share-qq');
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
                    ShowTimeStatistic.wechat('artworklist', '{{ $artwork->md5 }}', 'share-weibo');
                },
                cancel: function () {
                }
            });

        });
    </script>
@endsection
