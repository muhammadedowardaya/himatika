<div class="container-menu">
    <div class="menu" style="">
        <div class="toggle">
            <img src="{{ asset('img/logo-himatika.jpg') }}" alt="">
        </div>
        <li style="--i:0;">
            <a href="{{ route('himatika.index') }}" id="home">
                <ion-icon name="home-outline" title="Home"></ion-icon>
            </a>
        </li>
        <li style="--i:1;">
            <a href="#" class="klik_menu" title="About" id="about">
                <ion-icon name="information-outline"></ion-icon>
            </a>
        </li>
        <li style="--i:2;">
            <a href="#" class="klik_menu" title="Struktur Organisasi" id="organization">
                <ion-icon name="cog-outline"></ion-icon>
            </a>
        </li>
        <li style="--i:3;">
            <a href="#" class="klik_menu" title="Event" id="event">
                <ion-icon name="calendar-number-outline"></ion-icon>
            </a>
        </li>
        <li style="--i:4;">
            <a href="/gallery">
                <ion-icon name="camera-outline"></ion-icon>
            </a>
        </li>
        <li style="--i:5;">
            <a href="/posts">
                <ion-icon name="document-text-outline"></ion-icon>
            </a>
        </li>

    </div>
</div>

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
                y: -60,
                ease: "power1.out",
                opacity: 1
            })
            gsap.to('h2.text-himatika', {
                opacity: 1,
            })
        } else if (containerMenu.classList.contains('menuactive') == true) {
            containerMenu.classList.remove('menuactive');
            containerMenu.classList.add('menunoactive');
            gsap.to('.menunoactive', {
                y: 15,
                ease: "power1.out"
            }).delay(1)
            gsap.to(containerMenu, {
                opacity: 0.5,
                duration: 1.5
            }).delay(5)
            gsap.to('h2.text-himatika', {
                opacity: 0.5,
                duration: 1.5
            }).delay(5)
        }
    })




    const home = document.querySelector('#home');
    home.addEventListener('click', function() {
        $("#overlay").fadeIn(300);
    });

    const klikMenu = document.querySelectorAll('.klik_menu');
    klikMenu.forEach(klikMenu => {
        klikMenu.addEventListener('click', function(e) {
            e.preventDefault();
            var klikMenu = $(this).attr('id');
            if (klikMenu == "about") {
                // $('.container-content').load('himatika/home.blade.php');
                $("#overlay").fadeIn(300);
                $.get(BASE + '/about', function(data) {
                    $("#overlay").fadeOut(300);
                    $('.container-content').html(data);
                    // console.log(data);
                    // console.log(status);
                });
            } else if (klikMenu == 'event') {
                $("#overlay").fadeIn(300);
                $.get(BASE + '/post/event', function(data) {
                    $("#overlay").fadeOut(300);
                    $('.container-content').html(data);
                    // console.log(data);
                    // console.log(status);
                });
            } else if (klikMenu == 'organization') {
                $("#overlay").fadeIn(300);
                $.get(BASE + '/organization', function(data) {
                    $("#overlay").fadeOut(300);
                    $('.container-content').html(data);
                    // console.log(data);
                    // console.log(status);
                });
            }
        })
    })

    // ubah angka pada rotate circular menu
    // Get the root element
    var r = document.querySelector(':root');
    // Get the styles (properties and values) for the root
    var rs = getComputedStyle(r);
    // get
    // rs.getPropertyValue('--blue');
    // set
    r.style.setProperty('--totalLi', (menu.childElementCount - 1));
    r.style.setProperty('--minusTotalLi', '-' + (menu.childElementCount - 1));
    const minusTotalLi = rs.getPropertyValue('--minusTotalLi');
</script>
