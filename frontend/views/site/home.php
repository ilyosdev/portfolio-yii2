<!doctype html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui" />
    <title>IlyosDev</title>
    <meta name="keywords"
        content="web developer, developer, ilyos olimov, programmer, web, developt, html, css, javascript, html">
    <meta name="description" content="">
    <meta name="google" content="notranslate" />
    <link rel="apple-touch-icon" sizes="180x180" href="url/img/fav/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="url/img/fav/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="url/img/fav/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="url/img/fav/manifest.json">
    <link rel="shortcut icon" href="url/img/fav/favicon.ico">
    <meta name="theme-color" content="#ffffff">
    <meta itemprop="name" content="Ilyos Olimov">
    <meta itemprop="description" content="I am a full-stack web developer. I mean it, bro!">
    <meta itemprop="image" content="">
    <meta property="og:title" content="" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="url/" />
    <meta property="og:image" content="" />
    <meta property="og:description" content="" />
    <meta property="og:site_name" content="Ilyos Olimov" />
    <meta property="article:section" content="Blog" />
    <link rel='stylesheet' id='reset-css' href='assets/cssjs/css.css' type='text/css' media='all' />
    <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
</head>

<body class="off  single home ">
    <div id="preload"></div>

    <div id="nav" class="off loading">
        <div id="ham">
            <div class="bar">
                <div class="load"></div>
            </div>
        </div>
        <a href="/" id="logo"></a>
    </div>

    <nav>
        <div></div>
        <ul>
            <li>
                <a class="me" href="url/">
                    <span>HOME</span>
                </a>

            </li>
            <li>
                <a class="me" href="./about.html">
                    <span>ABOUT</span></a>

            </li>
            <li>
                <a class="me" href="./blog.html">
                    <span>BLOG</span></a>

            </li>
            <li>
                <a class="me" href="./work.html">
                    <span>WORK</span></a>
            </li>
        </ul>
    </nav>

    <div id="app">
        <img class="person" src="./assets/images/portfolio.png" alt="TT">

        <!-- <canvas id="noisebg" class="noise"></canvas> -->
        <div class="dir">WEB</div>

        <div id="intro" class="off">
            <div class="intro-name">
                Ilyos Olimov
            </div>
            <a href="./about.html" class="button">About Me<div class="mask"></div></a>
        </div>
    </div>

    <script type='text/javascript' src='./assets/cssjs/jquery.js'></script>
    <script type='text/javascript' src='./assets/cssjs/main.js'></script>
    <script type='text/javascript' src='./assets/cssjs/noise.js'></script>

    <script>
        $("body *").click(function (e) { if (e.target != this) return; $('body').removeClass('loggedin'); });
        $('#nav a, #next, .post a.title, .post .more, .carousel a').on('click', function (e) {
            e.preventDefault();
            $('body').addClass('off');
            $('#nav').addClass('loading');
            var $this = $(this);
            setTimeout(function () { window.location = $this.attr('href'); }, 400);
        });
    </script>
</body>

</html>