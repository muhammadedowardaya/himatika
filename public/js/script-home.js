function animasiIntro() {
    $("#text span").velocity("transition.slideLeftIn", {
        stagger: 150,
        complete: function () {
            animasiButtonStart();
        }
    });
}


function animasiButtonStart() {
    $("#start").mouseenter(function () {
        console.log('OK');
    });


    $("button#start").velocity("transition.bounceUpIn")
        .mouseenter(function () {
            // $(this).velocity({
            //     width: 125
            // });
            // gsap.to(this, {
            //     width: 100,
            // });
            console.log('OK');
        })
        .mouseleave(function () {
            // $(this).velocity({
            //     width: 125
            // });
            // gsap.to(this, {
            //     width: 120,
            // });
            console.log('Tutup');
        });
}

function animasiIntroOut() {
    $("#start").velocity("transition.whirlOut", {
        stagger: 150,
        complete: function () {
            $("#text .text-himatika").velocity({
                "font-size": "20px",
            }, {
                duration: 1000,
                complete: function () {
                    $('.container-content').css('display', 'block');
                    $('.container-main-menu').css('opacity', '1');
                    gsap.to('.container-content', {
                        transition: 3,
                        opacity: 1
                    });
                    $('.container-logo').css('bottom', '0');
                    const h1 = document.querySelector('h2.text-himatika');
                    h1.classList.add('active');
                    // $('#text .tex-himatika').css('-webkit-box-reflec', 'below -3px linear-gradient(transparent, #0004) !important');
                    $('nav#menu ul li').css('display', 'block');
                    $('section.main').css('display', 'block');
                    // document.querySelector('.container-menu').classList.add('active');
                    callMenu();
                    // $("#menu ul li a[href='what_we_do']").trigger("click");
                }
            });

            gsap.to('.container-logo', {
                y: 320,
                transition: 3
            });

        }
    });
}

function callMenu() {
    $("nav#menu ul li").velocity("transition.slideLeftIn", {
        stagger: 250
    });

    // $("nav#menu ul li a").click(function (e) {
    //     e.preventDefault();
    //     $(this).parent("li").addClass("active").siblings().removeClass("active");
    //     var hrefString = $(this).attr("href");
    //     $(".container-content").css("display", "none");
    //     document.querySelector("#" + hrefString).style.display = "flex";
    //     // document.querySelector("#" + hrefString).nextElementSibling.classList.remove("flex");
    //     // document.querySelector("#" + hrefString).previousElementSibling.classList.remove("flex");
    //     window[hrefString]();
    // })
}

function what_we_do() {

    $("#main #what_we_do section.gambar").velocity("transition.flipYIn", {
        duration: 3000,
    })
    $("#main #what_we_do div .title").velocity("transition.slideUpIn", {
        duration: 3000
    })

    $("#main #what_we_do div").velocity("transition.slideDownIn", {
        duration: 3000
    })
}

function our_team() {
    $("#our_team").velocity("transition.flipYIn", {
        duration: 5000
    });
}

function tampilScroll() {
    $(window).scroll(function () {
        let wScroll = $(this).scrollTop();
        console.log(wScroll);
    });
}

function tampil_menu() {
    $('.menu').css('display', 'flex');
}


$(document).ready(function () {

    // const textNama = document.querySelector(".intro #text pre");
    // const huruf = [...textNama.textContent].map(h => `<span>${h}</span>`).join("");
    // textNama.innerHTML = huruf;

    animasiIntro();
});



// document.querySelector("#" + hrefString).nextElementSibling.style.display = "none";
// document.querySelector("#" + hrefString).nextElementSibling.style.display = "none";
