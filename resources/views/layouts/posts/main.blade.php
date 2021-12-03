<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/circular-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/text-himatika.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">
    <title>@yield('title','Himatika')</title>
</head>

<body>

    @include('layouts.posts.menu')
    <div class="container-logo">
        <div class="intro">
            <div id="text">
                <!-- <pre>Hai gaes!</pre> -->
                <h2 class="text-himatika">
                    <span>HI</span><span>MA</span><span>TI</span><span>KA</span>
                </h2>
            </div>
        </div>
    </div>

    <div class="intro-button">
        <button id="start" onclick="animasiIntroOut();">
            START
        </button>
    </div>


    <div class="container-content">
        @yield('content')
    </div>




    <script type="text/javascript" src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/velocity/2.0.6/velocity.min.js"></script> --}}
    <script type="text/javascript" src="{{ asset('js/velocity.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/velocity.ui.min.js') }}"></script>
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/velocity/2.0.6/velocity.ui.min.js"></script> --}}
    <script type="text/javascript" src="{{ asset('js/script-home.js') }}"></script>

    <!-- bagian circular menu -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- gsap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js"></script>

    <script>
        let toggle = document.querySelector('.toggle');
        let menuContainer = document.querySelector('.section-menu');
        let menu = document.querySelector('.menu');

        toggle.addEventListener('click', function() {
            menu.classList.toggle('active');
            if (menuContainer.classList.contains('active') == false) {
                menuContainer.classList.add('active');
                menuContainer.classList.remove('noactive');
                gsap.to('.section-menu.active', {
                    y: -50
                });
            } else if (menuContainer.classList.contains('active') == true) {
                menuContainer.classList.remove('active');
                menuContainer.classList.add('noactive');
                gsap.to('.section-menu.noactive', {
                    y: 7
                }).delay(1);
            }
        })
    </script>
</body>

</html>
