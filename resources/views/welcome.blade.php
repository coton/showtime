<!doctype html>
<html class="no-js" lang="zh">
<head>
    <meta charset="utf-8">
    <title>SHOWTIME秀台</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ elixir('css/vendor.css') }}" />
    <link rel="stylesheet" href="{{ elixir('css/main.css') }}">
</head>
<body>
<!--[if lt IE 10]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="container" id="container">
    <div class="banner">
        <div class="slider"><img src="images/banner.jpg" width="1920" height="698">
        </div>
    </div>

    <div class="logo"><img src="images/logo.png" alt=""></div>



    <div class="useage-wrap">
        <div class="useage">
            <div class="step1"><img src="images/step1.png" alt=""></div>
            <div class="step2"><img src="images/step2.png" alt=""></div>
            <div class="step3"><img src="images/step3.png" alt=""></div>
        </div>
    </div>



    <div class="uploadandpreview-wrap">
        <div class="upload">
            <div class="icon"><img src="images/upload-icon.png" alt=""></div>
            <div class="info">请将图片拖拽至此进行上传</div>
            <div class="info">Drop you image files to here</div>
        </div>
        <div class="review">
            <div class="l">
                <div id="screen" class="screen">
                    <img id="artimg" src="images/example.png" alt="">
                    <div class="process-rate"><!--20%--></div>
                    <div class="process">Processing...</div>
                </div>
            </div>
            <div class="r">
                <div class="pt1">
                    <div class="qr" id="qrcode"><img src="images/qr.png" alt=""></div>
                    <a id="download" href="images/qr.png" download="QRCODE" title="下载二维码(Download QR Code)">
                        <img class="download" src="images/download.png" alt="">
                    </a>

                    <img id="print" class="print" src="images/print.png" title="打印二维码(Print QR Code)">
                </div>
                <div class="pt2">
                    <p><span>①</span>您可以扫描此二维码</p>
                    <p>通过手机来欣赏您的作品集。 </p>
                    <p class="sencond">Scan the above QR and </p>
                    <p>view your work in mobile.</p>
                </div>
                <div class="pt3">
                    <p><span>②</span>您可以将此二维码打</p>
                    <p>印并放置在展会入口或海报内。 </p>
                    <p class="sencond">Print out the QR code and </p>
                    <p>place it in the gallery entrance </p>
                    <p>or inside the poster.</p>
                </div>
            </div>
        </div>
    </div>



    <div class="footer-wrap">
        <div class="f3">
            <div class="coffee">C<span>OFFEE</span> W<span>ITH</span> U<span>S</span>?</div>
        </div>

        <div class="copyright">
            Createc Solution 2016; All Rights Reserved<span>沪 ICP 备 14054408 号 - 6</span>
        </div>

        <div class="f1"><img src="images/logo.png" alt=""></div>
        <div class="f2"><p>Empowered by</p>  <p>Createc Solution.</p></div>
        <div class="f4"><img src="images/contact.png" alt=""></div>
    </div>

</div>

<script src="{{ elixir('js/vendor.js') }}"></script>
<script src="{{ elixir('js/main.js') }}"></script>
</body>
</html>
