<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <style id="" media="all">
        /* vietnamese */
        * {
            -webkit-box-sizing: border-box;
            box-sizing: border-box
        }

        body {
            padding: 0;
            margin: 0
        }

        #notfound {
            position: relative;
            height: 100vh
        }

        #notfound .notfound-bg {
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: url(@yield('image'));
            background-size: cover
        }

        #notfound .notfound-bg:after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, .25)
        }

        #notfound .notfound {
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%)
        }

        #notfound .notfound:after {
            content: '';
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            width: 100%;
            height: 600px;
            background-color: rgba(255, 255, 255, .7);
            -webkit-box-shadow: 0 0 0 30px rgba(255, 255, 255, .7) inset;
            box-shadow: 0 0 0 30px rgba(255, 255, 255, .7) inset;
            z-index: -1
        }

        .notfound {
            max-width: 600px;
            width: 100%;
            text-align: center;
            padding: 30px;
            line-height: 1.4
        }

        .notfound .notfound-404 {
            position: relative;
            height: 200px
        }

        .notfound .notfound-404 h1 {
            font-family: passion one, cursive;
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            font-size: 220px;
            margin: 0;
            color: #222225;
            text-transform: uppercase
        }

        .notfound h2 {
            font-family: muli, sans-serif;
            font-size: 26px;
            font-weight: 400;
            text-transform: uppercase;
            color: #222225;
            margin-top: 26px;
            margin-bottom: 20px
        }

        .notfound-search {
            position: relative;
            padding-right: 120px;
            max-width: 420px;
            width: 100%;
            margin: 30px auto 20px
        }

        .notfound-search input {
            font-family: muli, sans-serif;
            width: 100%;
            height: 40px;
            padding: 3px 15px;
            color: #fff;
            font-weight: 400;
            font-size: 18px;
            background: #222225;
            border: none
        }

        .notfound-search button {
            font-family: muli, sans-serif;
            position: absolute;
            right: 0;
            top: 0;
            width: 120px;
            height: 40px;
            text-align: center;
            border: none;
            background: #ff00b4;
            cursor: pointer;
            padding: 0;
            color: #fff;
            font-weight: 400;
            font-size: 16px;
            text-transform: uppercase
        }

        .notfound a {
            font-family: muli, sans-serif;
            display: inline-block;
            font-weight: 400;
            text-decoration: none;
            background-color: transparent;
            color: #222225;
            text-transform: uppercase;
            font-size: 14px
        }

        .notfound-social {
            margin-bottom: 15px
        }

        .notfound-social>a {
            display: inline-block;
            height: 40px;
            line-height: 40px;
            width: 40px;
            font-size: 14px;
            color: #fff;
            background-color: #222225;
            margin: 3px;
            -webkit-transition: .2s all;
            transition: .2s all
        }

        .notfound-social>a:hover {
            color: #fff;
            background-color: #ff00b4
        }

        @media only screen and (max-width:480px) {
            .notfound .notfound-404 {
                height: 146px
            }

            .notfound .notfound-404 h1 {
                font-size: 146px
            }

            .notfound h2 {
                font-size: 22px
            }
        }

        @font-face {
            font-family: 'Muli';
            font-style: normal;
            font-weight: 400;
            src: url(/fonts.gstatic.com/s/muli/v22/7Aulp_0qiz-aVz7u3PJLcUMYOFnOkEk40eiNxw.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
        }

        /* latin-ext */
        @font-face {
            font-family: 'Muli';
            font-style: normal;
            font-weight: 400;
            src: url(/fonts.gstatic.com/s/muli/v22/7Aulp_0qiz-aVz7u3PJLcUMYOFnOkEk50eiNxw.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }

        /* latin */
        @font-face {
            font-family: 'Muli';
            font-style: normal;
            font-weight: 400;
            src: url(/fonts.gstatic.com/s/muli/v22/7Aulp_0qiz-aVz7u3PJLcUMYOFnOkEk30eg.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

    </style>
    <style id="" media="all">
        /* latin-ext */
        @font-face {
            font-family: 'Passion One';
            font-style: normal;
            font-weight: 400;
            src: url(/fonts.gstatic.com/s/passionone/v11/PbynFmL8HhTPqbjUzux3JEuf9lvQ6Q.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }

        /* latin */
        @font-face {
            font-family: 'Passion One';
            font-style: normal;
            font-weight: 400;
            src: url(/fonts.gstatic.com/s/passionone/v11/PbynFmL8HhTPqbjUzux3JEuR9ls.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

    </style>

    <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css" />

    <link type="text/css" rel="stylesheet" href="css/style.css" />
    <meta name="robots" content="noindex, follow">
</head>

<body>
    <div id="notfound">
        <div class="notfound-bg"></div>
        <div class="notfound">
            <img src="{{Asset('img/logo.png')}}" height="90pt" />
            <div class="notfound-404">
                <h1>@yield('code')</h1>
            </div>
            <h2>@yield('message')</h2>
            <div>
                <img src="@yield('gif')"  height="125px" >
            </div>
            <a href="{{route('main')}}">volver al inicio</a>
        </div>
    </div>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');

    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js"
        data-cf-beacon='{"rayId":"656c9a213c1f7f78","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.5.2","si":10}'>
    </script>
</body>

</html>
