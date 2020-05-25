<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Example</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/4.5/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">


    <style>
        .b-main-title {
            color: #0046ea;
            margin: 0 20% 0 -20%;
            border: 9px solid #fff;
            padding: 58px 60% 64px 50px;
            background: #fff;
            border-radius: 200px;
            font: 41px/54px UltimaPro-Bold;
        }
        .bg-dark {
            background-color: #0046ea !important;
        }
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        .list-group-item {
            border: 3px solid #0046ea;
        }
        .jumbotron {
            background-color: #ffe45c;
        }
        .button {
            position: relative;
            top: -130px;
        }
        .button .btn-success {
            background-color:#37dd86;
            border:3px solid #37dd86;
            border-radius: 50px;
            padding: 10px 30px;
        }
        .button .btn-success:hover {
            border-color: #37dd86;
        }
        .button .btn-success:focus, .btn-success:hover {
            background-color: #fff;
            border-color: #0046ea;
            color: #333;
        }
        footer.bg-danger-light {
            background: #97ffab;
        }
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container d-flex justify-content-between">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="mr-2" viewBox="0 0 24 24" focusable="false"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                    <strong>XML example</strong>
                </a>
            </div>
        </div>
    </header>

    <main role="main">
        <form method="get" action="./">
            <section class="jumbotron text-center">
                <div class="container">
                    <h1 class="b-main-title">XML example</h1>
                    <div class="button">
                        <button type="submit" class="btn btn-success my-2">Refresh</button>
                    </div>
                </div>
            </section>

            <div class="album py-5">
                <div class="container">
                    <ul class="list-group">
                    <?
                    require_once 'KiddisvitApi.php';

                    $kiddisvitApi = new KiddisvitApi('YjJiOjE1OTc1Mw==');

                    $xmlstr = $kiddisvitApi->fakeRequest();
                    $xml = simplexml_load_string($xmlstr);

                    foreach($xml->children() as $node) { ?>
                        <?php if (empty($node->attributes()->name)) continue; ?>
                        <li class="list-group-item">
                            <span>Tag <?php echo $node->getName() . ', name: ' . $node->attributes()->name ?></span>
                        </li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
        <form>
    </main>

    <footer class="text-muted bg-danger-light py-2">
        <div class="container">
            <p class="float-right">
                <a href="#">Back to top</a>
            </p>
            <p>© XML example</p>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>