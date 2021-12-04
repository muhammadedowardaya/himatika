$(document).ready(function () {
    gsap.from('.button-start', {
        duration: 3,
        scale: 0.1,
        y: -390,
        rotationY: 720,
        transformOrigin: "50% 50% -200px",
        opacity: 0,
        ease: "power2.out"
    }).delay(2);


    $('.button-start').click(function (e) {
        e.preventDefault();
        himatikaDown();
    });


    function himatikaDown() {
        gsap.to('.button-start', {
            opacity: 0,
            duration: 1.7,
            rotationX: 520,
            scale: 0.1,
            ease: "power1.out",
            display: "none",
            onComplete: () => {
                gsap.to('h2.text-himatika', {
                    duration: 2.5,
                    scale: 0.3,
                    y: 260,
                    ease: "circ.out",
                    onComplete: () => {
                        gsap.to('.container-menu', {
                            opacity: 1,
                            duration: 2,
                            rotationY: 360,
                            ease: "power1.out",
                            bottom: 5
                        })
                        gsap.to('.container-content', {
                            duration: 2,
                            ease: "power1.out",
                            display: "inline-block",
                            opacity: 1
                        })
                    }
                });
            }
        });

    }

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
    console.log(minusTotalLi);

})
