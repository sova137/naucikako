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
    <link rel="stylesheet" href="/css/search.css"  />


    <link rel="stylesheet" href="css/bootstrap-social.css" />
    <link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">



    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
    <link href="/css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />

    <!-- snow -->
   <script src="/js/snowstorm.js"></script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.js"></script>
    <script src="/js/star-rating.js" type="text/javascript"></script>

    <script src='https://www.google.com/recaptcha/api.js'></script>

    <link rel="stylesheet" href="css/bootstrap-social.css" />


    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

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
