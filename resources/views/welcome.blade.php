<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                /* background-color: #fff; */
                /* color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh; */
                margin: 0;
                padding: 0;
            }
            .slider {
            position: relative;
            width: 100%;
            height: 100vh;
            margin: auto;
            overflow: hidden;
            }
            .slide {
                width: 100%;
                height: 100%;
                position: absolute;
                transform: translate(100%,0%);
            }
            .active {
                transform: translate(0,0);
            }
            .active ˜ .slide {
                transform: translate(100%, 0);
            }
            .s1 {
                background: url('slider/slide1.jpg');
                background-size: 100% 100%;
            }
            .s2 {
                background: url('slider/slide3.jpg');
                background-size: 100% 100%;
            }
            .s3 {
                background: url('slider/slide1.jpg');
                background-size: 100% 100%;
            }
            .s4 {
                background: url('slider/slide3.jpg');
                background-size: 100% 100%;
            }
            .box {
                width: 100%;
                height: 100vh;
                background: url('slider/./Line\ pattern.png');
                background-size: 100% 100%;
                background-repeat: no-repeat;
                position: absolute;
                z-index: 999;
                -webkit-clip-path:polygon(0% 100%, 100% 100%, 100% 80%, 93% 85%, 8% 95%, 15% 6%, 89% 2%, 93% 95%, 100% 90%, 100% 0%, 0% 0%, 0% 100%);
                transition: 2s;
            }
            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                color: black;
                background-color: white; 
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                color: black;
                background-color: white;
            }

            .m-b-md {
                margin-bottom: 200px;
            }
            .wrap-area {
                position: absolute;
                top: 50px;
                left: 150px;
                width: 1100px;
                height: 600px;
                /* border: 1px solid red; */
                z-index: 1000;
            }
        </style>
    </head>
    <body>
    <div class="wrap-area">
    <div class="flex-center position-ref full-height">
            

            <div class="content">
                <div class="title m-b-md">
                    Stay Frosty
                </div>

                <div class="links">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                @endif

            
                </div>
            </div>
        </div>
    
    </div>
    <div class="box"></div>
            
        <div class="slider">
            <div class="slide s1 active"></div>
            <div class="slide s2"></div>
            <div class="slide s3"></div>
            <div class="slide s4"></div>
        </div>

    </body>
    <script type="text/javascript">

        var slides = $('.slide');
        var flag = 0;

        slides.first().before(slides.last());

        setInterval(show, 4000);

        function show() {
            slides = $('.slide');
            var activeSlide = $('.active');

            slides.last().after(slides.first());

            activeSlide.removeClass('active').next('.slide').addClass('active');

            if(flag==0) {
                $('.box').css({'-webkit-clip-path':'polygon(0% 100%, 100% 100%, 100% 90%,85% 95%, 10% 78%, 7% 6%, 90% 5%, 85% 95%, 100% 95%, 100% 0%, 0% 0%, 0% 100%)'});
                flag=1;
            } else {
                $('.box').css({'-webkit-clip-path':"polygon(0% 100%, 100% 100%, 100% 80%, 93% 85%, 8% 95%, 15% 6%, 89% 2%, 93% 85%, 100% 80%, 100% 0%, 0% 0%, 0% 100%)"});
                flag=0;
            }
        }
    </script>
</html>
