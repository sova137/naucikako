<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo csrf_token() ?>">


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nauči kako</title>

    <link rel="icon" href="/naucikako-logo.ico"/>
    <link rel="stylesheet" href="{{asset("/css/search.css")}}"  />


    <link rel="stylesheet" href="{{asset("css/bootstrap-social.css")}}" />
    <link rel="stylesheet" href="{{asset("font-awesome-4.6.3/css/font-awesome.min.css")}}">



    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
    <link href="{{asset("/css/star-rating.min.css")}}" media="all" rel="stylesheet" type="text/css" />

    <!-- snow -->
   <script src="{{asset("/js/snowstorm.js")}}"></script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.js"></script>
    <script src="{{asset("/js/star-rating.js")}}" type="text/javascript"></script>

    <script src='https://www.google.com/recaptcha/api.js'></script>

    <link rel="stylesheet" href="{{asset("css/bootstrap-social.css")}}" />


    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset("css/style.css") }}"/> <!-- OBAVEZNO ASSET INACE LAYOUT NECE RADITI -->
    <link rel="stylesheet" href="{{asset("css/loader.css") }}" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'>
    <script src="{{asset("/js/script.js")}}"></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
          rel = "stylesheet">
    <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>


    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

<?php include('../resources/views/navbar.blade.php');?>


@yield('content')



<?php include('../resources/views/footer.blade.php');?>



</body>
</html>
