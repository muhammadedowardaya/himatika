<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Himatika | Profile</title>
    <link rel="stylesheet" href="{{ 'css/style-profile.css' }}">
    <link rel="stylesheet" href="{{ 'css/bootstrap-custom.css' }}">
    @yield('css')
</head>

<body>
    <div id="overlay">
        <div class="cv-spinner">
            <span class="spinner"></span>
        </div>
    </div>
    @include('layouts.intro')
    @include('layouts.menu')
    <div class="container-content">
        @yield('content')
    </div>

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js"></script> -->
    <script src="{{ asset('js/gsap.min.js') }}"></script>
    <script src="{{ 'js/script-profile.js' }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    @yield('script')

    <script type="text/javascript">
        var BASE = "<?php url(); ?>";
    </script>

</body>

</html>
