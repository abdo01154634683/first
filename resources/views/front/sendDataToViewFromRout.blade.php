<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
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
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>
                <div>
                    <!--print array of data that get from route from it call view -->
                    {{--<p>Name : {{$name}} Age : {{$age}} </p>
                    <p>Name : {{$object->name}} Age : {{$object->age}} </p>--}}

                    <!-- to get data from message file that exist in lang folder-->
                    <!-- messages is file name and abdo is key in returned array-->
                    <!--  طيب هيجيب من انه ملف 'messages من العربي ولا الانجليزي علي حسب الاعدادات ولكن الافتراض انجليزي'-->
                    {{--<p>{{__('messages.abdo')}}</p> --}}
                   {{-- <p>{{__('messages.ahmed')}}</p> --}}
                    <!-- if statement in view -->
                {{--
                    @if($name=='ahmed')
                        <p>ahmed</p>
                        @foreach($info as $member)
                            <p>{{$member}}</p>
                        @endforeach
                    @endif
                  --}}
                    <!-- if statement and else -->
                    {{--
                    @if($name=='ahmed')
                        <p>ahmed emam</p>
                    @else
                        <p>not ahmed emam</p>
                    @endif
                    --}}
                    @foreach($data as $par)
                        <p>{{$par}}</p>
                    @endforeach
                    @foreach($message as $m)
                        <p>{{$m}}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</html>
