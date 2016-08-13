<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>!!</title>

    <script src="/js/jquery-2.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/validator.min.js"></script>

    <link rel="stylesheet" href="/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css"/>

</head>
<body>

<header class="container">

    <div class="row">
        <div class="panel-body">
                <div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">
                    <form action="/changeLang" method="POST" class="text-right" style="display: inline-block">
                        <input type="hidden" name="lang" value="RU"/>
                        <input type="submit" value="RU" class="btn">
                    </form>
                    <form action="/changeLang" method="POST" class="text-right" style="display: inline-block">
                        <input type="hidden" name="lang" value="EN"/>
                        <input type="submit" value="EN" class="btn">
                    </form>
                </div>
        </div>
    </div>
</header>

<div class="container">
    @yield('content')
</div>
</body>
</html>