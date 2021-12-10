<div class="content">
    <h1 style="text-align: center;margin-bottom:30px;">Struktur Organisasi</h1>
    <figure class="org-chart cf">
        <ul class="administration">
            <li>
                <ul class="director">
                    <li class="ketua">
                        <a href="#" class="ordCard">
                            <span>Ketua</span>
                            <span>Rully Ambika</span>
                        </a>
                        <br>
                    <li>
                        <a href="#" class="ordCard">
                            <span>Wakil Ketua</span>
                            <span>Aludin</span>
                        </a>
                    </li>
                    <ul class="sekretaris">
                        <li><a href="#" class="ordCard">
                                <span>Sekretaris</span>
                                <span>Neneng F</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="departments cf">
                        <li>
                            <a href="#" class="ordCard">
                                <span>Bendahara</span>
                                <span>Hidayah M</span>
                            </a>
                        </li>

                        <li class="department dep-a">
                            <a href="#" class="ordCard">
                                <span>Acara</span>
                                <span class="nama">M Ilham</span>
                                <span class="nama">Syarah</span>
                            </a>
                            <ul class="sections">
                                <li class="section">
                                    <a href="#" class="ordCard">
                                        <span>Anggota</span>
                                        <span class="nama">Rahmita</span>
                                        <span class="nama">Edo</span>
                                    </a>
                                </li>
                                <!-- <li class="section"><a href="#"><span>Section A2</span></a></li>
                  <li class="section"><a href="#"><span>Section A3</span></a></li>
                  <li class="section"><a href="#"><span>Section A4</span></a></li>
                  <li class="section"><a href="#"><span>Section A5</span></a></li> -->
                            </ul>
                        </li>
                        <li class="department dep-b">
                            <a href="#" class="ordCard" id="humas">
                                <span>Humas</span>
                                <span class="nama">Iwan</span>
                                <span class="nama">Sayyidah</span>
                            </a>
                            <ul class="sections">
                                <li class="section">
                                    <a href="#" class="ordCard">
                                        <span>Anggota</span>
                                        <span class="nama">Dafa</span>
                                        <span class="nama">Lia</span>
                                    </a>
                                </li>
                                <!-- <li class="section"><a href="#"><span>Section B2</span></a></li>
                  <li class="section"><a href="#"><span>Section B3</span></a></li>
                  <li class="section"><a href="#"><span>Section B4</span></a></li> -->
                            </ul>
                        </li>
                        <li class="department dep-c">
                            <a href="#" class="ordCard" id="multimedia">
                                <span>Multimedia</span>
                                <span class="nama">M Asfi P</span>
                                <span class="nama">St. Nurjanah</span>
                            </a>
                            <ul class="sections">
                                <li class="section">
                                    <a href="#" class="ordCard">
                                        <span>Anggota</span>
                                        <span class="nama">Tri Agung</span>
                                        <span class="nama">Dais Pratama</span>
                                        <span class="nama">Karisma</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="department tambahGaris dep-d">
                            <a href="#" id="fundraising" class="ordCard">
                                <span>Fundraising</span>
                                <span class="nama">Ikhsan Kasrudin</span>
                                <span class="nama">Rahma</span>
                            </a>
                            <ul class="sections">
                                <li class="section"><a href="#" class="ordCard">
                                        <span>Anggota</span>
                                        <span class="nama">Oris R</span>
                                        <span class="nama">Anggun</span>
                                        <span class="nama">Ferdi</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="department tambahGaris dep-e">
                            <a href="#" id="logistik" class="ordCard">
                                <span>Logistik</span>
                                <span class="nama">M Sidik</span>
                                <span class="nama">Siti Rahmawati</span>
                            </a>
                            <ul class="sections">
                                <li class="section"><a href="#" class="ordCard">
                                        <span>Anggota</span>
                                        <span class="nama">Dani</span>
                                        <span class="nama">Syahril</span>
                                        <span class="nama">Neni</span>
                                        <span class="nama">St. Mardiah</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
            </li>
        </ul>

        </li>
        </ul>
    </figure>
</div>


<style>
    * {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        position: relative;
    }

    .container-content {
        display: contents !important;
        z-index: -10;
        min-height: 100vh;
    }

    .cf:before,
    .cf:after {
        content: " ";
        /* 1 */
        display: table;
        /* 2 */
    }

    .cf:after {
        clear: both;
    }

    /**
         * For IE 6/7 only
         * Include this rule to trigger hasLayout and contain floats.
         */
    .cf {
        *zoom: 1;
    }

    /* Generic styling */

    body {
        background: #F5EEC9;
    }

    .content {
        width: 100%;
        max-width: 1142px;
        margin: 0 auto;
        padding: 0 20px;
        margin-bottom: 80vh;
        margin-top: 10vh;
    }

    a.ordCard:focus {
        outline: 2px dashed #f7f7f7;
    }

    @media all and (max-width: 767px) {
        .content {
            padding: 0 20px;
        }
    }

    ul {
        padding: 0;
        margin: 0;
        list-style: none;
    }

    ul a {
        padding-top: 10px;
        display: block;
        background: #ccc;
        border: 4px solid #fff;
        text-align: center;
        overflow: hidden;
        font-size: .7em;
        text-decoration: none;
        font-weight: bold;
        color: #333;
        height: max-content;
        margin-bottom: -26px;
        box-shadow: 4px 4px 9px -4px rgba(0, 0, 0, 0.4);
        -webkit-transition: all linear .1s;
        -moz-transition: all linear .1s;
        transition: all linear .1s;
    }

    @media all and (max-width: 767px) {
        ul a {
            font-size: 1em;
        }

        a#fundraising {
            margin-top: 120px;
        }

        a#logistik {
            margin-top: 120px;
        }

        a#humas {
            margin-top: 100px;
        }

        a#multimedia {
            margin-top: 100px;
        }

        a#fundraising::before {
            content: "";
            display: block;
            position: absolute;
            width: 0;
            height: 127px;
            border-left: 4px solid white;
            z-index: 1;
            top: -103px;
            left: 0%;
            margin-left: -4px;
        }
    }


    ul a span {
        top: 20%;
        margin-top: -0.7em;
        padding: 9px;
        display: block;
    }

    ul a span:first-child {
        padding-top: 10px;
    }

    ul a span:first-child::after {
        content: "";
        display: block;
        border-bottom: 1px solid rgb(90, 86, 86);
        margin-top: 5px;
    }

    ul a span.nama {
        padding: 5px 0;
    }

    /*
         
         */

    .administration>li>a {
        margin-bottom: 25px;
    }

    .director>li>a {
        width: 50%;
        margin: 0 auto 0px auto;
    }

    .sekretaris:after {
        content: "";
        display: block;
        width: 0;
        height: 130px;
        background: red;
        border-left: 4px solid #fff;
        left: 49.6%;
        position: relative;
    }

    .sekretaris,
    .departments {
        position: absolute;
        width: 100%;
    }

    .sekretaris>li:first-child,
    .departments>li:first-child {
        width: 18.59894921190893%;
        height: 64px;
        margin: 0 auto 92px auto;
        padding-top: 25px;
        border-bottom: 4px solid white;
        z-index: 1;
    }

    .sekretaris>li:first-child {
        float: right;
        right: 27.2%;
        border-left: 4px solid white;
    }

    .departments>li:first-child {
        float: left;
        left: 27.2%;
        border-right: 4px solid white;
    }

    .sekretaris>li:first-child a,
    .departments>li:first-child a {
        width: 100%;
    }

    .sekretaris>li:first-child a {
        left: 25px;
    }

    @media all and (max-width: 767px) {

        .sekretaris>li:first-child,
        .departments>li:first-child {
            width: 40%;
        }

        .sekretaris>li:first-child {
            right: 10%;
            margin-right: 2px;
        }

        .sekretaris:after {
            left: 49.8%;
        }

        .departments>li:first-child {
            left: 10%;
            margin-left: 2px;
        }
    }


    .departments>li:first-child a {
        right: 25px;
    }

    .department:first-child,
    .departments li:nth-child(2) {
        margin-left: 0;
        clear: left;
    }

    .departments:after {
        content: "";
        display: block;
        position: absolute;
        width: 81.1%;
        height: 22px;
        border-top: 4px solid #fff;
        border-right: 4px solid #fff;
        border-left: 4px solid #fff;
        margin: 0 auto;
        top: 130px;
        left: 9.1%
    }

    @media all and (max-width: 767px) {
        .departments:after {
            border-right: none;
            left: 0;
            width: 49.8%;
        }

        .department.tambahGaris::before {
            content: "";
            display: block;
            position: absolute;
            width: 0;
            height: 250px;
            border-left: 4px solid white;
            z-index: 1;
            top: -160px;
            left: 0%;
            margin-left: -4px;
        }


    }

    @media all and (min-width: 768px) {

        .department:first-child:before,
        .department:last-child:before {
            border: none;
        }
    }

    .department:before {
        content: "";
        display: block;
        position: absolute;
        width: 0;
        height: 22px;
        border-left: 4px solid white;
        z-index: 1;
        top: -22px;
        left: 50%;
        margin-left: -4px;
    }

    .department {
        border-left: 4px solid #fff;
        width: 18.59894921190893%;
        float: left;
        margin-left: 1.751313485113835%;
        margin-bottom: 60px;
    }

    .lt-ie8 .department {
        width: 18.25%;
    }

    @media all and (max-width: 767px) {
        .department {
            float: none;
            width: 100%;
            margin-left: 0;
        }

        .department:before {
            content: "";
            display: block;
            position: absolute;
            width: 0;
            height: 200px;
            border-left: 4px solid white;
            z-index: 1;
            top: -105px;
            left: 0%;
            margin-left: -4px;
        }


        .department:nth-child(2):before {
            display: none;
        }
    }

    .department>a {
        margin: 0 0 -26px -4px;
        z-index: 1;
    }

    /* .department>a:hover {
            height: 80px;
        } */

    .department>ul {
        margin-top: 0px;
        margin-bottom: 0px;
    }

    .department li {
        padding-left: 25px;
        border-bottom: 4px solid #fff;
        height: 80px;
    }

    .department li a {
        background: #fff;
        top: 48px;
        position: absolute;
        z-index: 1;
        width: 90%;
        height: max-content;
        vertical-align: middle;
        right: -1px;
        background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIxMDAlIiB5Mj0iMTAwJSI+CiAgICA8c3RvcCBvZmZzZXQ9IjAlIiBzdG9wLWNvbG9yPSIjMDAwMDAwIiBzdG9wLW9wYWNpdHk9IjAuMjUiLz4KICAgIDxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iIzAwMDAwMCIgc3RvcC1vcGFjaXR5PSIwIi8+CiAgPC9saW5lYXJHcmFkaWVudD4KICA8cmVjdCB4PSIwIiB5PSIwIiB3aWR0aD0iMSIgaGVpZ2h0PSIxIiBmaWxsPSJ1cmwoI2dyYWQtdWNnZy1nZW5lcmF0ZWQpIiAvPgo8L3N2Zz4=);
        background-image: -moz-linear-gradient(-45deg, rgba(0, 0, 0, 0.25) 0%, rgba(0, 0, 0, 0) 100%) !important;
        background-image: -webkit-gradient(linear, left top, right bottom, color-stop(0%, rgba(0, 0, 0, 0.25)), color-stop(100%, rgba(0, 0, 0, 0))) !important;
        background-image: -webkit-linear-gradient(-45deg, rgba(0, 0, 0, 0.25) 0%, rgba(0, 0, 0, 0) 100%) !important;
        background-image: -o-linear-gradient(-45deg, rgba(0, 0, 0, 0.25) 0%, rgba(0, 0, 0, 0) 100%) !important;
        background-image: -ms-linear-gradient(-45deg, rgba(0, 0, 0, 0.25) 0%, rgba(0, 0, 0, 0) 100%) !important;
        background-image: linear-gradient(135deg, rgba(0, 0, 0, 0.25) 0%, rgba(0, 0, 0, 0) 100%) !important;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#40000000', endColorstr='#00000000', GradientType=1);
    }

    .department li a:hover {
        box-shadow: 8px 8px 9px -4px rgba(0, 0, 0, 0.1);
        /* height: 80px; */
        width: 95%;
        top: 39px;
        background-image: none !important;
    }

    /* Department/ section colors */
    .department.dep-a a {
        background: #FFD600;
    }

    .department.dep-b a {
        background: #AAD4E7;
    }

    .department.dep-c a {
        background: #FDB0FD;
    }

    .department.dep-d a {
        background: #A3A2A2;
    }

    .department.dep-e a {
        background: #f0f0f0;
    }

    /* ketua */
    .ketua::after {
        content: "";
        display: block;
        position: absolute;
        /* width: 78.1%; */
        height: 50px;
        border-top: 1px solid #fff;
        border-right: 1px solid #fff;
        border-left: 4px solid #fff;
        margin: 0 auto;
        top: 67px;
        left: 49.1%;
        z-index: -1;
    }

</style>
