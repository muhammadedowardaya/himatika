<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Himatik | Profile</title>
    <link rel="stylesheet" href="{{ 'css/style-profile.css' }}">
    <link rel="stylesheet" href="{{ 'css/bootstrap-custom.css' }}">
</head>

<body>

    @include('layouts.intro')
    <div class="container-content">
        @yield('content')
    </div>

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js"></script> -->
    <script src="{{ asset('js/gsap.min.js') }}"></script>
    <script src="{{ 'js/script-profile.js' }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
        let toggle = document.querySelector('.toggle');
        let menu = document.querySelector('.menu');
        let containerMenu = document.querySelector('.container-menu');

        toggle.addEventListener('click', function() {
            menu.classList.toggle('active');
            if (containerMenu.classList.contains('menuactive') == false) {
                containerMenu.classList.add('menuactive');
                containerMenu.classList.remove('menunoactive');
                gsap.to('.menuactive', {
                    y: -65,
                    ease: "power1.out"
                })
            } else if (containerMenu.classList.contains('menuactive') == true) {
                containerMenu.classList.remove('menuactive');
                containerMenu.classList.add('menunoactive');
                gsap.to('.menunoactive', {
                    y: 3,
                    ease: "power1.out"
                }).delay(1)
            }
        })
    </script>
</body>

</html>
