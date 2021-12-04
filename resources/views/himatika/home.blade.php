<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Name</title>
    <style>
        /* nama_saya.php */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            align-items: center;
            min-height: 100vh;
            background: #00050a;
            color: #eeeeee;
        }

        h1 {
            position: relative;
            font-family: "lato", sans-serif;
            font-size: 3vw;
            font-weight: bold;
            padding-left: 10vw;
            overflow: hidden;
        }

        h1 .box {
            position: absolute;
            bottom: 0;
            display: inline-block;
            background-color: #2800ad;
            height: 1vw;
            z-index: -1;
            width: 100px;
        }

        h1 .hi {
            display: inline-block;
            text-shadow: 1px 1px 2px black;
        }

    </style>
</head>

<body>

    <h1>
        <span class="box"></span>
        <span class="hi text-white">HIMATIKA,</span>
        <span class="text"></span>
        <span class="cursor">_</span>
    </h1>



    <script src="{{ asset('js/gsap.min.js') }}"></script>
    <script src="{{ asset('js/TextPlugin.min.js') }}"></script>
    <script src="{{ asset('js/EasePack.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

    <script>
        // Halaman Awal
        gsap.registerPlugin(TextPlugin, RoughEase);

        const words = [
            "Himpunan Mahasiswa Informatika",
            "Menjadi Himpunan Mahasiswa",
            "yang Islami,",
            "Cerdas",
            "dan Mandiri",
        ];

        let cursor = gsap.to(".cursor", {
            opacity: 0,
            ease: "power2.inOut",
            repeat: -1,
        });

        let boxTL = gsap.timeline();

        boxTL
            .to(".box", {
                duration: 2,
                width: "21vw",
                delay: 0.5,
                ease: "power4.inOut",
            })
            .from(".hi", {
                duration: 1,
                y: "7vw",
                ease: "power3.out",
                onComplete: () => masterTl.play(),
            })
            .to(".box", {
                height: "7vw",
                duration: 2.5,
                ease: "elastic.out(1,0.3)",
            })
            .to(".box", {
                duration: 2,
                autoAlpha: 0.2,
                yoyo: true,
                repeat: -1,
                ease: "rough({ template: none.out, strength:1, points:20, taper:'none', randomize: true, clamp: false})",
            });

        let masterTl = gsap.timeline({
            repeat: -1
        }).pause();

        words.forEach((word) => {
            let tl = gsap.timeline({
                repeat: 1,
                yoyo: true,
                repeatDelay: 1
            });
            tl.to(".text", {
                duration: 1,
                text: word
            });
            masterTl.add(tl);
        });
    </script>
</body>

</html>
